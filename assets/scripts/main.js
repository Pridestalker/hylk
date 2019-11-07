__webpack_public_path__ = document.querySelector('meta[name="asset_base"]').content || '/';
import Router from './tools/Router';

const common = async () =>
    ( await import(/* webpackChunkName: "dist/scripts/routes/common" */ './routes/Common') ).default;
const home = async () =>
    (await import(/* webpackChunkName: "dist/scripts/routes/home" */ './routes/Home')).default;


const router = new Router({
    common: common(),
    home: home()
});

function ready(fn) {
    if (document.readyState !== 'loading'){
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

ready(() => router.loadEvents())
