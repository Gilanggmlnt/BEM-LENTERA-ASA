import React from 'react';
import ReactFlow, { Background, Controls, MiniMap } from 'reactflow';
import 'reactflow/dist/style.css';

const CardNode = ({ data }) => (
    <div className="w-[150px] text-center p-3 bg-white rounded-xl border shadow">
        <img src={data.foto} className="w-20 h-20 mx-auto rounded-lg object-cover mb-2" alt={data.nama} />
        <p className="text-sm font-semibold">{data.jabatan}</p>
        <p className="text-xs text-gray-500">{data.nama}</p>
    </div>
);

const LogoNode = ({ data }) => (
    <div className="w-[130px] text-center p-3 bg-white rounded-xl border shadow">
        <img src={data.foto} className="w-16 h-16 mx-auto mb-2" alt={data.nama} />
        <p className="text-xs font-semibold">{data.nama}</p>
    </div>
);

const nodeTypes = {
    card: CardNode,
    logo: LogoNode,
};

const StrukturBEM = ({ nodes, edges }) => {
    // ReactFlow requires that the 'data' property of each node is an object,
    // and the 'label' is a separate property. Since we are using custom nodes,
    // we can pass the data directly. However, for default nodes, we need to ensure
    // the label is set. Let's process the nodes to be safe.
    const processedNodes = nodes.map(node => {
        if (node.data.type === 'card') {
            return { ...node, type: 'card' };
        }
        if (node.data.type === 'logo') {
            return { ...node, type: 'logo' };
        }
        return node;
    });

    return (
        <div className="w-full h-[800px] overflow-x-auto border rounded-xl shadow bg-white">
            <div className="min-w-[1400px] h-full">
                <ReactFlow
                    nodes={processedNodes}
                    edges={edges}
                    nodeTypes={nodeTypes}
                    fitView
                    panOnScroll
                    zoomOnScroll
                >
                    <MiniMap />
                    <Controls />
                    <Background gap={16} />
                </ReactFlow>
            </div>
        </div>
    );
};

export default StrukturBEM;
