<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use Illuminate\Support\Str;

class StrukturController extends Controller
{
    public function index()
    {
        $csv = Reader::createFromPath(storage_path('app/data_bemkbmpolines.csv'), 'r');
        $csv->setHeaderOffset(0);
        $records = collect($csv->getRecords());

        $nodes = [];
        $edges = [];

        // --- HIERARCHY AND LAYOUT DEFINITION ---

        $hierarchy = [
            'presiden-mahasiswa' => ['parent' => null, 'level' => 0],
            'wakil-presiden-mahasiswa' => ['parent' => 'presiden-mahasiswa', 'level' => 1],
            'sekretaris-kabinet' => ['parent' => 'wakil-presiden-mahasiswa', 'level' => 2, 'group' => 'sekretariat'],
            'menko-internal' => ['parent' => 'wakil-presiden-mahasiswa', 'level' => 2, 'group' => 'internal'],
            'menko-kemahasiswaan' => ['parent' => 'wakil-presiden-mahasiswa', 'level' => 2, 'group' => 'kemahasiswaan'],
            'menko-kemasyarakatan' => ['parent' => 'wakil-presiden-mahasiswa', 'level' => 2, 'group' => 'kemasyarakatan'],
            'menko-relasi-dan-pergerakan' => ['parent' => 'wakil-presiden-mahasiswa', 'level' => 2, 'group' => 'relasi'],
        ];

        $kementerianGroups = [
            'Kementerian Kesekretariatan' => 'sekretariat',
            'Kementerian Keuangan' => 'sekretariat',
            'Kementerian Komunikasi dan Informasi' => 'sekretariat',
            'Kementerian Dalam Negeri' => 'internal',
            'Kementerian Pengembangan Sumber Daya Mahasiswa' => 'internal',
            'Kementerian Agama' => 'kemahasiswaan',
            'Kementerian Advokasi dan Kesejahteraan Mahasiswa' => 'kemahasiswaan',
            'Kementerian Minat dan Bakat' => 'kemahasiswaan',
            'Kementerian Riset dan Keilmuan' => 'kemahasiswaan',
            'Kementerian Ekonomi Kreatif' => 'kemasyarakatan',
            'Kementerian Sosial Masyarakat' => 'kemasyarakatan',
            'Kementerian Lingkungan Hidup' => 'kemasyarakatan',
            'Kementerian Luar Negeri' => 'relasi',
            'Kementerian Sosial Politik' => 'relasi',
        ];
        
        $groupCoordinates = [
            'sekretariat' => ['x' => 1000, 'yOffset' => 500, 'parent' => 'sekretaris-kabinet'],
            'internal' => ['x' => 0, 'yOffset' => 700, 'parent' => 'menko-internal'],
            'kemahasiswaan' => ['x' => 400, 'yOffset' => 700, 'parent' => 'menko-kemahasiswaan'],
            'kemasyarakatan' => ['x' => 800, 'yOffset' => 900, 'parent' => 'menko-kemasyarakatan'],
            'relasi' => ['x' => 1200, 'yOffset' => 900, 'parent' => 'menko-relasi-dan-pergerakan'],
        ];

        // --- NODE CREATION ---

        // Create Pres, Wapres, Sekre, Menkos
        $topLevelPositions = [
            'Presiden Mahasiswa' => ['x' => 750, 'y' => 50],
            'Wakil Presiden Mahasiswa' => ['x' => 750, 'y' => 200],
            'Sekretaris Kabinet' => ['x' => 1000, 'y' => 350],
            'Menko Internal' => ['x' => 0, 'y' => 500],
            'Menko Kemahasiswaan' => ['x' => 400, 'y' => 500],
            'Menko Kemasyarakatan' => ['x' => 800, 'y' => 700],
            'Menko Relasi dan Pergerakan' => ['x' => 1200, 'y' => 700],
        ];

        foreach ($topLevelPositions as $jabatan => $pos) {
            $fungsionaris = $records->firstWhere('jabatan ', $jabatan);
            if ($fungsionaris) {
                $id = Str::slug($jabatan);
                $nodes[] = [
                    'id' => $id,
                    'position' => $pos,
                    'data' => [
                        'jabatan' => $jabatan,
                        'nama' => $fungsionaris['nama'],
                        'foto' => '/images/' . $fungsionaris['foto'],
                    ],
                    'type' => 'card',
                ];
                $parent = $hierarchy[$id]['parent'] ?? null;
                if ($parent) {
                    $edges[] = ['id' => "e-{$parent}-{$id}", 'source' => $parent, 'target' => $id, 'type' => 'smoothstep'];
                }
            }
        }
        
        // Create Kementerian Nodes
        $kementerianNodes = [];
        foreach ($records as $record) {
            $kementerianName = trim($record['kementerian']);
            if (!empty($kementerianName) && !isset($kementerianNodes[$kementerianName])) {
                $groupName = $kementerianGroups[$kementerianName] ?? null;
                if ($groupName) {
                    $kementerianNodes[$kementerianName] = ['group' => $groupName, 'id' => Str::slug($kementerianName)];
                }
            }
        }

        foreach ($groupCoordinates as $groupName => $coords) {
            $kemsInGroup = array_filter($kementerianNodes, fn($kem) => $kem['group'] === $groupName);
            $kemCount = count($kemsInGroup);
            $i = 0;
            foreach ($kemsInGroup as $kemName => $kemData) {
                $nodes[] = [
                    'id' => $kemData['id'],
                    'position' => [
                        'x' => $coords['x'] + ($i % 2 * 180), // Simple horizontal staggering
                        'y' => $coords['yOffset'] + (floor($i / 2) * 150)
                    ],
                    'data' => [
                        'nama' => $kemName,
                        'foto' => '/images/logo_kementerian/logo_' . Str::slug($kemName, '') . '.png',
                    ],
                    'type' => 'logo',
                ];
                $edges[] = ['id' => "e-{$coords['parent']}-{$kemData['id']}", 'source' => $coords['parent'], 'target' => $kemData['id'], 'type' => 'smoothstep'];
                $i++;
            }
        }

        return view('pages.struktur', [
            'nodes' => json_encode($nodes), 
            'edges' => json_encode($edges)
        ]);
    }
}
