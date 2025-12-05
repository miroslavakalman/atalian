function initFAQ() {
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    const serviceImage = document.querySelector('.service-img');

    if (dropdownItems.length === 0) {
        console.log('FAQ: нет элементов на странице');
        return;
    }

    const serviceImages = {
        0: 'img/service-1.png',
        1: 'img/service-2.png',
        2: 'img/service-3.png',
        3: 'img/service-4.png',
        4: 'img/service-5.png',
        5: 'img/service-6.png',
    };

    dropdownItems.forEach((item, index) => {
        const closed = item.querySelector('.dropdown-closed');

        if (closed) {
            closed.addEventListener('click', function() {
                const isActive = item.classList.contains('active');

                dropdownItems.forEach(it => it.classList.remove('active'));

                if (!isActive) {
                    item.classList.add('active');

                    if (serviceImage) {
                        serviceImage.style.opacity = '0';
                        setTimeout(() => {
                            serviceImage.src = serviceImages[index];
                            serviceImage.style.opacity = '1';
                        }, 300);
                    }
                }
            });
        }

        const arrowUp = item.querySelector('.arrow-up');
        if (arrowUp) {
            arrowUp.addEventListener('click', function(e) {
                e.stopPropagation();
                item.classList.remove('active');
            });
        }
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-item')) {
            dropdownItems.forEach(item => item.classList.remove('active'));
        }
    });
}
