(function () {
    const sectionsContainer = document.querySelector('[data-price-sections]');

    if (!sectionsContainer) {
        return;
    }

    const sectionTemplate = document.querySelector('#nika-price-section-template');
    const serviceTemplate = document.querySelector('#nika-price-service-template');
    const addSectionButton = document.querySelector('[data-add-price-section]');

    const createFragment = (template) => {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = template.innerHTML.trim();

        return wrapper.firstElementChild;
    };

    const syncIndices = () => {
        const sections = sectionsContainer.querySelectorAll('[data-price-section]');

        sections.forEach((section, sectionIndex) => {
            const titleInput = section.querySelector('[data-price-section-title]');

            if (titleInput) {
                titleInput.name = `nika_prices[${sectionIndex}][title]`;
            }

            const services = section.querySelectorAll('[data-price-service]');

            services.forEach((service, serviceIndex) => {
                const nameInput = service.querySelector('[data-price-service-name]');
                const priceInput = service.querySelector('[data-price-service-price]');

                if (nameInput) {
                    nameInput.name = `nika_prices[${sectionIndex}][services][${serviceIndex}][name]`;
                }

                if (priceInput) {
                    priceInput.name = `nika_prices[${sectionIndex}][services][${serviceIndex}][price]`;
                }
            });
        });
    };

    const addSection = () => {
        const section = createFragment(sectionTemplate);

        sectionsContainer.appendChild(section);
        syncIndices();
    };

    const addService = (section) => {
        const servicesContainer = section.querySelector('[data-price-services]');
        const service = createFragment(serviceTemplate);

        servicesContainer.appendChild(service);
        syncIndices();
    };

    const moveElement = (element, direction) => {
        const sibling = direction === 'up' ? element.previousElementSibling : element.nextElementSibling;

        if (!sibling) {
            return;
        }

        if (direction === 'up') {
            sibling.before(element);
        } else {
            sibling.after(element);
        }

        syncIndices();
    };

    if (addSectionButton) {
        addSectionButton.addEventListener('click', addSection);
    }

    sectionsContainer.addEventListener('click', (event) => {
        const section = event.target.closest('[data-price-section]');
        const service = event.target.closest('[data-price-service]');

        if (event.target.closest('[data-add-price-service]') && section) {
            addService(section);
            return;
        }

        if (event.target.closest('[data-remove-section]') && section) {
            section.remove();
            syncIndices();
            return;
        }

        if (event.target.closest('[data-remove-service]') && service) {
            service.remove();
            syncIndices();
            return;
        }

        const moveSectionButton = event.target.closest('[data-move-section]');

        if (moveSectionButton && section) {
            moveElement(section, moveSectionButton.dataset.moveSection);
            return;
        }

        const moveServiceButton = event.target.closest('[data-move-service]');

        if (moveServiceButton && service) {
            moveElement(service, moveServiceButton.dataset.moveService);
        }
    });

    syncIndices();
}());
