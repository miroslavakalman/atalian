function initCounter() {
    const statsSection = document.querySelector('.stats');

    if (!statsSection) {
        console.log('Счетчик: нет блока статистики на странице');
        return;
    }

    function animateNumbers() {
        const numberElements = document.querySelectorAll('.stat h3[data-target]');
        if (numberElements.length === 0) return;

        numberElements.forEach(element => {
            const target = parseFloat(element.getAttribute('data-target'));
            const suffix = element.getAttribute('data-suffix') || '';
            const duration = 2000;
            const steps = 20;
            const stepValue = target / steps;

            let current = 0;
            let step = 0;

            const timer = setInterval(() => {
                current += stepValue;
                step++;

                if (step >= steps) {
                    current = target;
                    clearInterval(timer);
                }

                if (target % 1 === 0) element.textContent = Math.floor(current) + suffix;
                else element.textContent = current.toFixed(3) + suffix;
            }, duration / steps);
        });
    }

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumbers();
                observer.unobserve(statsSection);
            }
        });
    }, { threshold: 0.5 });

    observer.observe(statsSection);
}
