// Modern JavaScript for Enhanced UI/UX
import './bootstrap';

// Enhanced UI Manager
class UIManager {
    constructor() {
        this.init();
    }

    init() {
        this.setupIntersectionObserver();
        this.setupSmoothScrolling();
        this.setupEnhancedTooltips();
        this.setupCopyToClipboard();
        this.setupLoadingStates();
        this.setupFormEnhancements();
        this.setupKeyboardNavigation();
        this.setupPerformanceOptimizations();
    }

    // Enhanced Intersection Observer for animations
    setupIntersectionObserver() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with reveal classes
        document.querySelectorAll('.reveal-on-scroll, .animate-on-scroll').forEach(el => {
            el.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700', 'ease-out');
            observer.observe(el);
        });
    }

    // Smooth scrolling with enhanced behavior
    setupSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80; // Account for fixed header
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Enhanced tooltip system
    setupEnhancedTooltips() {
        document.querySelectorAll('[data-tooltip]').forEach(element => {
            const tooltipText = element.getAttribute('data-tooltip');
            const tooltip = document.createElement('div');
            
            tooltip.className = 'absolute z-50 px-3 py-2 text-sm text-white bg-gray-900 rounded-lg shadow-lg opacity-0 pointer-events-none transition-all duration-200 whitespace-nowrap';
            tooltip.textContent = tooltipText;
            
            // Add arrow
            const arrow = document.createElement('div');
            arrow.className = 'absolute w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900';
            tooltip.appendChild(arrow);
            
            element.classList.add('relative');
            element.appendChild(tooltip);
            
            const showTooltip = () => {
                tooltip.classList.remove('opacity-0');
                tooltip.classList.add('opacity-100');
                
                // Position tooltip
                const rect = element.getBoundingClientRect();
                const tooltipRect = tooltip.getBoundingClientRect();
                
                let left = rect.left + (rect.width / 2) - (tooltipRect.width / 2);
                let top = rect.top - tooltipRect.height - 8;
                
                // Adjust if tooltip goes off screen
                if (left < 8) left = 8;
                if (left + tooltipRect.width > window.innerWidth - 8) {
                    left = window.innerWidth - tooltipRect.width - 8;
                }
                if (top < 8) {
                    top = rect.bottom + 8;
                    arrow.className = 'absolute w-0 h-0 border-l-4 border-r-4 border-b-4 border-transparent border-b-gray-900 top-0 transform -translate-y-full';
                }
                
                tooltip.style.left = `${left}px`;
                tooltip.style.top = `${top}px`;
            };
            
            const hideTooltip = () => {
                tooltip.classList.add('opacity-0');
                tooltip.classList.remove('opacity-100');
            };
            
            element.addEventListener('mouseenter', showTooltip);
            element.addEventListener('mouseleave', hideTooltip);
            element.addEventListener('focus', showTooltip);
            element.addEventListener('blur', hideTooltip);
        });
    }

    // Enhanced copy to clipboard
    setupCopyToClipboard() {
        document.querySelectorAll('[data-copy]').forEach(button => {
            button.addEventListener('click', async () => {
                const textToCopy = button.getAttribute('data-copy');
                const originalContent = button.innerHTML;
                
                try {
                    await navigator.clipboard.writeText(textToCopy);
                    
                    // Visual feedback
                    button.innerHTML = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Tersalin!
                    `;
                    button.classList.add('bg-green-100', 'text-green-800');
                    
                    // Show success toast
                    this.showToast('Berhasil disalin ke papan klip', 'success');
                    
                } catch (err) {
                    button.innerHTML = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Gagal!
                    `;
                    button.classList.add('bg-red-100', 'text-red-800');
                    
                    // Show error toast
                    this.showToast('Gagal menyalin teks', 'error');
                }
                
                // Reset button after delay
                setTimeout(() => {
                    button.innerHTML = originalContent;
                    button.classList.remove('bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800');
                }, 2000);
            });
        });
    }

    // Enhanced loading states
    setupLoadingStates() {
        // Add loading states to forms
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', () => {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    `;
                }
            });
        });

        // Add loading states to buttons
        document.querySelectorAll('[data-loading]').forEach(button => {
            button.addEventListener('click', () => {
                if (button.dataset.loading === 'true') return;
                
                button.dataset.loading = 'true';
                const originalContent = button.innerHTML;
                
                button.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading...
                `;
                button.disabled = true;
                
                // Reset after 3 seconds (or when action completes)
                setTimeout(() => {
                    button.innerHTML = originalContent;
                    button.disabled = false;
                    button.dataset.loading = 'false';
                }, 3000);
            });
        });
    }

    // Enhanced form interactions
    setupFormEnhancements() {
        // Auto-resize textareas
        document.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', () => {
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
            });
        });

        // Enhanced input focus effects
        document.querySelectorAll('.form-input, input, textarea, select').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('ring-2', 'ring-primary-500/20');
            });
            
            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('ring-2', 'ring-primary-500/20');
            });
        });

        // Form validation feedback
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500', 'ring-red-500/20');
                        
                        // Add error message
                        let errorMsg = field.parentElement.querySelector('.form-error');
                        if (!errorMsg) {
                            errorMsg = document.createElement('p');
                            errorMsg.className = 'form-error';
                            field.parentElement.appendChild(errorMsg);
                        }
                        errorMsg.textContent = 'Field ini wajib diisi';
                    } else {
                        field.classList.remove('border-red-500', 'ring-red-500/20');
                        const errorMsg = field.parentElement.querySelector('.form-error');
                        if (errorMsg) errorMsg.remove();
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    this.showToast('Mohon lengkapi semua field yang wajib', 'warning');
                }
            });
        });
    }

    // Enhanced keyboard navigation
    setupKeyboardNavigation() {
        // Escape key to close modals
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('[role="dialog"]:not(.hidden)');
                if (openModal) {
                    this.closeModal(openModal);
                }
            }
        });

        // Tab key navigation enhancement
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                const focusableElements = document.querySelectorAll(
                    'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
                );
                
                const firstElement = focusableElements[0];
                const lastElement = focusableElements[focusableElements.length - 1];
                
                if (e.shiftKey && document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                } else if (!e.shiftKey && document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        });
    }

    // Performance optimizations
    setupPerformanceOptimizations() {
        // Lazy load images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Debounce scroll events
        let scrollTimeout;
        window.addEventListener('scroll', () => {
            if (scrollTimeout) clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                this.handleScroll();
            }, 16); // ~60fps
        }, { passive: true });
    }

    // Scroll handler
    handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Header elevation effect
        const header = document.querySelector('nav.sticky');
        if (header) {
            if (scrollTop > 10) {
                header.classList.add('shadow-md', 'bg-white/95');
            } else {
                header.classList.remove('shadow-md', 'bg-white/95');
            }
        }
        
        // Scroll to top button
        const scrollTopBtn = document.getElementById('scrollTopBtn');
        if (scrollTopBtn) {
            if (scrollTop > 600) {
                scrollTopBtn.classList.remove('hidden');
            } else {
                scrollTopBtn.classList.add('hidden');
            }
        }
    }

    // Toast notification system
    showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toast-root') || this.createToastContainer();
        
        const toast = document.createElement('div');
        const colors = {
            info: 'bg-blue-600',
            success: 'bg-green-600',
            warning: 'bg-yellow-600',
            error: 'bg-red-600'
        };
        
        toast.className = `rounded-xl ${colors[type]} text-white text-sm px-4 py-3 shadow-xl opacity-0 translate-y-2 transition-all duration-300 max-w-sm`;
        
        const content = document.createElement('div');
        content.className = 'flex items-center gap-3';
        
        const icon = document.createElement('div');
        icon.innerHTML = type === 'success' ? '✓' : type === 'error' ? '✕' : type === 'warning' ? '⚠' : 'ℹ';
        icon.className = 'text-lg font-bold';
        
        const text = document.createElement('span');
        text.textContent = message;
        
        content.appendChild(icon);
        content.appendChild(text);
        toast.appendChild(content);
        
        toastContainer.appendChild(toast);
        
        // Animate in
        requestAnimationFrame(() => {
            toast.classList.remove('opacity-0', 'translate-y-2');
        });
        
        // Auto remove
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    // Create toast container if it doesn't exist
    createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toast-root';
        container.className = 'fixed top-4 right-4 z-50 space-y-3';
        document.body.appendChild(container);
        return container;
    }

    // Modal management
    openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Animate in
            requestAnimationFrame(() => {
                const backdrop = modal.querySelector('.modal-backdrop');
                const content = modal.querySelector('.modal-content');
                if (backdrop) backdrop.classList.remove('opacity-0');
                if (content) content.classList.remove('opacity-0', 'scale-95');
            });
        }
    }

    closeModal(modal) {
        const backdrop = modal.querySelector('.modal-backdrop');
        const content = modal.querySelector('.modal-content');
        
        if (backdrop) backdrop.classList.add('opacity-0');
        if (content) content.classList.add('opacity-0', 'scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 200);
    }
}

// Enhanced Chart Manager
class ChartManager {
    constructor() {
        this.charts = new Map();
        this.init();
    }

    init() {
        this.setupCharts();
        this.setupResponsiveCharts();
    }

    setupCharts() {
        // Setup stats chart
        const statsCanvas = document.getElementById('statsChart');
        if (statsCanvas) {
            this.createStatsChart(statsCanvas);
        }
    }

    createStatsChart(canvas) {
        const ctx = canvas.getContext('2d');
        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Publikasi', 'Proyek', 'Perangkat Lunak'],
                datasets: [{
                    label: 'Jumlah',
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)'
                    ],
                    hoverBackgroundColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(245, 158, 11, 1)'
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(245, 158, 11, 1)'
                    ],
                    borderWidth: 2,
                    borderRadius: 12,
                    borderSkipped: false,
                    maxBarThickness: 60,
                    data: [0, 0, 0],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: prefersReduced ? false : { 
                    duration: 800,
                    easing: 'easeOutQuart'
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(17, 24, 39, 0.95)',
                        borderColor: 'rgba(59, 130, 246, 0.6)',
                        borderWidth: 2,
                        cornerRadius: 12,
                        padding: 12,
                        titleFont: { size: 14, weight: '600' },
                        bodyFont: { size: 13 },
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return `${context.parsed.y} item`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { 
                            color: 'rgba(0,0,0,0.06)', 
                            borderColor: 'rgba(0,0,0,0.08)',
                            drawBorder: false
                        },
                        ticks: { 
                            color: '#6b7280',
                            font: { size: 12, weight: '500' }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grace: '10%',
                        ticks: { 
                            precision: 0, 
                            color: '#6b7280',
                            font: { size: 12, weight: '500' }
                        },
                        grid: { 
                            color: 'rgba(0,0,0,0.06)', 
                            borderColor: 'rgba(0,0,0,0.08)',
                            drawBorder: false
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        this.charts.set('stats', chart);
        this.loadStatsData(chart);
    }

    async loadStatsData(chart) {
        try {
            const response = await fetch('/api/stats/overview');
            const data = await response.json();
            
            const stats = {
                publications: Number(data.publications) || 0,
                projects: Number(data.projects) || 0,
                software: Number(data.software) || 0,
            };
            
            // Update chart data
            chart.data.datasets[0].data = [stats.publications, stats.projects, stats.software];
            chart.update('active');
            
            // Hide skeleton
            const skeleton = document.getElementById('chart-skeleton');
            if (skeleton) {
                skeleton.style.opacity = '0';
                setTimeout(() => skeleton.classList.add('hidden'), 300);
            }
            
            // Update accessibility
            const live = document.getElementById('stats-live');
            if (live) {
                live.textContent = `Statistik diperbarui: Publikasi ${stats.publications}, Proyek ${stats.projects}, Perangkat Lunak ${stats.software}.`;
            }
            
        } catch (error) {
            console.error('Error loading stats:', error);
            this.handleChartError();
        }
    }

    handleChartError() {
        const skeleton = document.getElementById('chart-skeleton');
        if (skeleton) skeleton.classList.add('hidden');
        
        const canvas = document.getElementById('statsChart');
        if (canvas) {
            canvas.style.display = 'none';
            const errorDiv = document.createElement('div');
            errorDiv.className = 'flex items-center justify-center h-full text-center';
            errorDiv.innerHTML = `
                <div class="space-y-2">
                    <svg class="w-12 h-12 mx-auto text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <p class="text-sm text-gray-600">Gagal memuat data statistik</p>
                    <button onclick="location.reload()" class="text-xs text-blue-600 hover:text-blue-700 underline">Coba lagi</button>
                </div>
            `;
            canvas.parentNode.appendChild(errorDiv);
        }
    }

    setupResponsiveCharts() {
        window.addEventListener('resize', () => {
            this.charts.forEach(chart => {
                if (chart.resize) chart.resize();
            });
        });
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Initialize UI Manager
    window.uiManager = new UIManager();
    
    // Initialize Chart Manager
    window.chartManager = new ChartManager();
    
    // Add global utility functions
    window.showToast = (message, type) => window.uiManager.showToast(message, type);
    window.openModal = (modalId) => window.uiManager.openModal(modalId);
    window.closeModal = (modal) => window.uiManager.closeModal(modal);
});

// Export for module usage
export { UIManager, ChartManager };
