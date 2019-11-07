export default class Menu {
    /**
     * Menu constructor.
     *
     * @param {string|HTMLElement} menu
     * @param {string|HTMLElement} button
     */
    constructor(menu, button) {
        this.menuElement = menu;
        this.buttonElement = button;
        this.setup();
    }

    setup() {
        this.ACTIVE_MENU_CLASS = 'active';
        this.ACTIVE_BODY_CLASS = 'menu-open';
    }

    /**
     * sets Menu.button
     *
     * @param {string|HTMLElement} button
     */
    set buttonElement(button) {
        if (!(button instanceof HTMLElement)) {
            button = this.getButtonFromSelector(button);
        }

        if (!button) {
            throw new Error('Button not found');
        }

        this.button = button;
    }

    /**
     * sets Menu.menu
     *
     * @param {string|HTMLElement} menu
     */
    set menuElement(menu) {
        if (!(menu instanceof HTMLElement)) {
            menu = this.getMenuFromSelector(menu);
        }

        if (!menu) {
            throw new Error('Menu not found');
        }

        this.menu = menu;
    }

    /**
     * @param {string} selector
     * @returns {any | boolean}
     */
    getButtonFromSelector(selector) {
        return document.querySelector(selector) || false;
    }

    /**
     * @param {string} selector
     * @returns {any | boolean}
     */
    getMenuFromSelector(selector) {
        return document.querySelector(selector) || false;
    }

    init() {
        this.addButtonClickListener();
        this.addBodyClickListener();
    }

    addButtonClickListener() {
        this.button.addEventListener('click', ev => this.buttonClickListener(ev));
    }

    addBodyClickListener() {
        document.body.addEventListener('click', ev => this.bodyClickListener(ev));
    }

    /**
     * Button click listener function
     *
     * @param {MouseEvent} event
     */
    buttonClickListener(event) {
        this.menu.classList.add(this.ACTIVE_MENU_CLASS);
        document.body.classList.add(this.ACTIVE_BODY_CLASS);
    }

    /**
     * Body click listener function.
     * skips if click is in menu.
     *
     * @param {MouseEvent} event
     */
    bodyClickListener(event) {
        const target = event.target;
        if (target === this.menu || this.menu.contains(target)) {
            return;
        }

        this.menu.classList.remove(this.ACTIVE_MENU_CLASS);
        document.body.classList.remove(this.ACTIVE_BODY_CLASS);
    }
}
