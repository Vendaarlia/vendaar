const images = [
    { src: "/img/home-img/works-slider/img-5.png", project: "hostinger-ds-css.md" },
    { src: "/img/home-img/works-slider/img-1.png", project: "borgo-ds-css.md" },
    { src: "/img/home-img/works-slider/img-2.png", project: "maxim-ds-css.md" },
    { src: "/img/home-img/works-slider/img-3.png", project: "height-ds-css.md" },
    { src: "/img/home-img/works-slider/img-4.png", project: "aftermove-ds-css.md" },
    // { src: "/img/home-img/works-slider/img-6.png", project: "gni.md" },
    { src: "/img/home-img/works-slider/img-7.png", project: "pm-panel-ds-css.md" },
    // { src: "/img/home-img/works-slider/img-8.png", project: "woney.md" },
    // { src: "/img/home-img/works-slider/img-9.png", project: "baker.md" },

];

// Function to generate project page URL from project filename
function generateProjectUrl(projectFile) {
    // Extract filename without extension (e.g., "borgo-ds-css.md" -> "borgo-ds-css")
    const slug = projectFile.replace('.md', '');
    return `/project.html?slug=${slug}`;
}
