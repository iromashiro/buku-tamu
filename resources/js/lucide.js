import { createIcons, icons } from "lucide";

(function () {
    "use strict";

    // Lucide Icons
    createIcons({
         icons: {
    Menu,
    ArrowRight,
    Globe
  },
        "stroke-width": 1.5,
        nameAttr: "data-lucide",
    });
    window.lucide = {
        createIcons: createIcons,
        icons: icons,
    };
})();
