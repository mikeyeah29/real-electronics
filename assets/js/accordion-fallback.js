document.addEventListener('DOMContentLoaded', () => {
    const accordions = document.querySelectorAll('.js-accordion[data-js-accordion="true"]');

    accordions.forEach((accordion) => {
        const items = accordion.querySelectorAll('.wp-block-accordion-item');
        const autoclose = accordion.dataset.autoclose === 'true';

        const setItemState = (item, isOpen) => {
            const button = item.querySelector('.wp-block-accordion-heading__toggle');
            const panel = item.querySelector('.wp-block-accordion-panel');

            if (!button || !panel) return;

            item.classList.toggle('is-open', isOpen);
            button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            panel.hidden = !isOpen;
        };

        const closeSiblings = (currentItem) => {
            items.forEach((item) => {
                if (item !== currentItem) {
                    setItemState(item, false);
                }
            });
        };

        items.forEach((item, index) => {
            const button = item.querySelector('.wp-block-accordion-heading__toggle');

            if (!button) return;

            button.addEventListener('click', () => {
                const isOpen = button.getAttribute('aria-expanded') === 'true';

                if (autoclose) {
                    closeSiblings(item);
                }

                setItemState(item, !isOpen);
            });

            button.addEventListener('keydown', (event) => {
                const key = event.key;
                if (!['ArrowDown', 'ArrowUp', 'Home', 'End'].includes(key)) {
                    return;
                }

                event.preventDefault();

                const buttons = Array.from(
                    accordion.querySelectorAll('.wp-block-accordion-heading__toggle')
                );

                let nextIndex = index;

                if (key === 'ArrowDown') {
                    nextIndex = (index + 1) % buttons.length;
                }

                if (key === 'ArrowUp') {
                    nextIndex = (index - 1 + buttons.length) % buttons.length;
                }

                if (key === 'Home') {
                    nextIndex = 0;
                }

                if (key === 'End') {
                    nextIndex = buttons.length - 1;
                }

                buttons[nextIndex]?.focus();
            });
        });
    });
});
