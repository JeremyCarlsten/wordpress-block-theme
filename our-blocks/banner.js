
import { InnerBlocks } from "@wordpress/block-editor"


wp.blocks.registerBlockType("wbt/banner", {
    title: "WBT Banner",
    supports: {
        align: ["full"]
    },
    attributes: {
        align: { type: "string", default: "full" },
    },
    edit: EditComponent,
    save: SaveComponent
});

function EditComponent() {
    return (
        <div className="banner">
            <div className="banner-wrapper">
                <div className="banner-content">
                    <InnerBlocks allowedBlocks={['core/heading', 'core/paragraph', 'core/button', 'core/spacer']} />
                </div>
            </div>
            <div className="banner-scroll">
                <i class="bi bi-arrow-bar-down"></i>
            </div>
        </div>
    )
}

function SaveComponent() {
    return <InnerBlocks.Content />
}