import "./bootstrap";

import Alpine from "alpinejs";
import * as FilePond from "filepond";

import "filepond/dist/filepond.min.css";

FilePond.setOptions({
    locale: "es",
});
window.Alpine = Alpine;

Alpine.start();
