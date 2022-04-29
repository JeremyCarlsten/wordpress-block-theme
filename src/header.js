wp.blocks.registerBlockType("wbt/header", {
    title: "WBT Header",
    attributes: {
        isFixed: { type: "boolean", default: false }
    },
    edit: function () {
        return (
            <div className="wp-admin-placeholder-block"> Header Placeholder </div>
        )
    },
    save: function () {
        return null
    }
});
