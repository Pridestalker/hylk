export default {
    init() {
        // Javascript that fires on all pages.
        setupMenuOnMobileAndTablet();
    },

    finalize() {
        // Javascript that fires on all pages. after page specific JS is fires.
    }
}


const setupMenuOnMobileAndTablet = async () => {
    if (window.screen.width < 769) {
        const i = async () =>
            (await import(/* webpackChunkName: "dist/scripts/common/menu" */'./Common/Menu')).default;
        const Menu = await new i();
        new Menu('.main-menu', '.js-hamburger')
            .init();
    }
}
