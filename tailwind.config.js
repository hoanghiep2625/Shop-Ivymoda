module.exports = {
  content: ["./node_modules/flowbite/**/*.js", "./views/**/*.php"],
  theme: {
    extend: {},
  },
  plugins: [
    require("flowbite/plugin")({
      wysiwyg: true,
      datatables: true,
    }),
    require("flowbite-typography"),
  ],
};
