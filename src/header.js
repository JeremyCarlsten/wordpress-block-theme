wp.blocks.registerBlockType("wbt/header", {
  title: "WBT Header",
  edit: function () {
    return (
      <div className="wp-admin-placeholder-block"> Header Placeholder </div>
    );
  },
  save: function () {
    return null;
  },
});
