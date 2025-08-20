// Modern Component Library for Enhanced UI/UX
import { UIManager } from './app.js';

// Base Component Class
class Component {
    constructor(element, options = {}) {
        this.element = element;
        this.options = { ...this.defaultOptions, ...options };
        this.init();
    }

    get defaultOptions() {
        return {};
    }

    init() {
        // Override in subclasses
    }

    destroy() {
        // Cleanup method
    }
}

// Enhanced Button Component
class EnhancedButton extends Component {
    get defaultOptions() {
        return {
            loadingText: 'Loading...',
            successText: 'Success!',
            errorText: 'Error!',
            showLoading: true,
            showFeedback: true
        };
    }

    init() {
        this.originalContent = this.element.innerHTML;
        this.setupEventListeners();
    }

    setupEventListeners() {
        this.element.addEventListener('click', this.handleClick.bind(this));
    }

    async handleClick(e) {
        if (this.element.disabled) return;

        const action = this.element.dataset.action;
        if (action) {
            e.preventDefault();
            await this.executeAction(action);
        }
    }

    async executeAction(action) {
        try {
            this.setLoading(true);
            
            // Execute the action based on data-action
            switch (action) {
                case 'copy':
                    await this.handleCopy();
                    break;
                case 'submit':
                    await this.handleSubmit();
                    break;
                case 'delete':
                    await this.handleDelete();
                    break;
                default:
                    console.warn(`Unknown action: ${action}`);
            }
        } catch (error) {
            this.setError(error.message);
        } finally {
            this.setLoading(false);
        }
    }

    async handleCopy() {
        const text = this.element.dataset.copy;
        if (text) {
            await navigator.clipboard.writeText(text);
            this.setSuccess('Tersalin!');
            if (window.showToast) {
                window.showToast('Berhasil disalin ke papan klip', 'success');
            }
        }
    }

    async handleSubmit() {
        const form = this.element.closest('form');
        if (form) {
            // Let the form handle submission
            return;
        }
    }

    async handleDelete() {
        if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
            // Handle deletion logic
            this.setSuccess('Berhasil dihapus!');
        }
    }

    setLoading(loading) {
        if (loading && this.options.showLoading) {
            this.element.disabled = true;
            this.element.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                ${this.options.loadingText}
            `;
        } else {
            this.element.disabled = false;
            this.element.innerHTML = this.originalContent;
        }
    }

    setSuccess(message) {
        if (!this.options.showFeedback) return;
        
        this.element.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            ${message}
        `;
        this.element.classList.add('bg-green-100', 'text-green-800');
        
        setTimeout(() => {
            this.element.innerHTML = this.originalContent;
            this.element.classList.remove('bg-green-100', 'text-green-800');
        }, 2000);
    }

    setError(message) {
        if (!this.options.showFeedback) return;
        
        this.element.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            ${message}
        `;
        this.element.classList.add('bg-red-100', 'text-red-800');
        
        setTimeout(() => {
            this.element.innerHTML = this.originalContent;
            this.element.classList.remove('bg-red-100', 'text-red-800');
        }, 2000);
    }

    destroy() {
        this.element.removeEventListener('click', this.handleClick);
    }
}

// Enhanced Form Component
class EnhancedForm extends Component {
    get defaultOptions() {
        return {
            validateOnInput: true,
            showRealTimeValidation: true,
            autoResizeTextareas: true,
            enhanceSubmitButton: true
        };
    }

    init() {
        this.fields = this.element.querySelectorAll('input, textarea, select');
        this.submitButton = this.element.querySelector('button[type="submit"]');
        this.setupFormEnhancements();
    }

    setupFormEnhancements() {
        if (this.options.autoResizeTextareas) {
            this.setupTextareaResize();
        }
        
        if (this.options.showRealTimeValidation) {
            this.setupRealTimeValidation();
        }
        
        if (this.options.enhanceSubmitButton) {
            this.setupSubmitButton();
        }
        
        this.setupFormSubmission();
    }

    setupTextareaResize() {
        this.element.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', () => {
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
            });
            
            // Initial resize
            textarea.dispatchEvent(new Event('input'));
        });
    }

    setupRealTimeValidation() {
        this.fields.forEach(field => {
            field.addEventListener('blur', () => this.validateField(field));
            field.addEventListener('input', () => {
                if (this.options.validateOnInput) {
                    this.validateField(field);
                }
            });
        });
    }

    setupSubmitButton() {
        if (this.submitButton) {
            this.submitButton.addEventListener('click', (e) => {
                if (!this.validateForm()) {
                    e.preventDefault();
                    this.showFormError('Mohon lengkapi semua field yang wajib');
                }
            });
        }
    }

    setupFormSubmission() {
        this.element.addEventListener('submit', (e) => {
            if (!this.validateForm()) {
                e.preventDefault();
                this.showFormError('Mohon lengkapi semua field yang wajib');
                return false;
            }
            
            // Show loading state
            if (this.submitButton) {
                this.setSubmitButtonLoading(true);
            }
        });
    }

    validateField(field) {
        const isValid = this.isFieldValid(field);
        this.updateFieldValidation(field, isValid);
        return isValid;
    }

    isFieldValid(field) {
        if (field.hasAttribute('required') && !field.value.trim()) {
            return false;
        }
        
        if (field.type === 'email' && field.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(field.value);
        }
        
        if (field.hasAttribute('minlength')) {
            return field.value.length >= parseInt(field.getAttribute('minlength'));
        }
        
        if (field.hasAttribute('maxlength')) {
            return field.value.length <= parseInt(field.getAttribute('maxlength'));
        }
        
        return true;
    }

    updateFieldValidation(field, isValid) {
        const container = field.closest('.form-group') || field.parentElement;
        
        if (isValid) {
            field.classList.remove('border-red-500', 'ring-red-500/20');
            field.classList.add('border-green-500', 'ring-green-500/20');
            this.removeFieldError(container);
        } else {
            field.classList.remove('border-green-500', 'ring-green-500/20');
            field.classList.add('border-red-500', 'ring-red-500/20');
            this.showFieldError(container, this.getFieldErrorMessage(field));
        }
    }

    getFieldErrorMessage(field) {
        if (field.hasAttribute('required') && !field.value.trim()) {
            return 'Field ini wajib diisi';
        }
        
        if (field.type === 'email' && field.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value)) {
            return 'Format email tidak valid';
        }
        
        if (field.hasAttribute('minlength')) {
            const minLength = field.getAttribute('minlength');
            return `Minimal ${minLength} karakter`;
        }
        
        if (field.hasAttribute('maxlength')) {
            const maxLength = field.getAttribute('maxlength');
            return `Maksimal ${maxLength} karakter`;
        }
        
        return 'Field tidak valid';
    }

    showFieldError(container, message) {
        let errorElement = container.querySelector('.form-error');
        if (!errorElement) {
            errorElement = document.createElement('p');
            errorElement.className = 'form-error mt-1 text-sm text-red-600';
            container.appendChild(errorElement);
        }
        errorElement.textContent = message;
    }

    removeFieldError(container) {
        const errorElement = container.querySelector('.form-error');
        if (errorElement) {
            errorElement.remove();
        }
    }

    validateForm() {
        let isValid = true;
        this.fields.forEach(field => {
            if (!this.validateField(field)) {
                isValid = false;
            }
        });
        return isValid;
    }

    setSubmitButtonLoading(loading) {
        if (!this.submitButton) return;
        
        if (loading) {
            this.submitButton.disabled = true;
            this.submitButton.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses...
            `;
        } else {
            this.submitButton.disabled = false;
            this.submitButton.innerHTML = this.submitButton.dataset.originalText || 'Submit';
        }
    }

    showFormError(message) {
        if (window.showToast) {
            window.showToast(message, 'error');
        }
    }

    destroy() {
        this.fields.forEach(field => {
            field.removeEventListener('blur', this.validateField);
            field.removeEventListener('input', this.validateField);
        });
    }
}

// Enhanced Modal Component
class EnhancedModal extends Component {
    get defaultOptions() {
        return {
            closeOnBackdrop: true,
            closeOnEscape: true,
            trapFocus: true,
            autoFocus: true
        };
    }

    init() {
        this.backdrop = this.element.querySelector('.modal-backdrop');
        this.content = this.element.querySelector('.modal-content');
        this.closeButtons = this.element.querySelectorAll('[data-close-modal]');
        this.setupModalBehavior();
    }

    setupModalBehavior() {
        // Close button events
        this.closeButtons.forEach(button => {
            button.addEventListener('click', () => this.close());
        });
        
        // Backdrop click
        if (this.options.closeOnBackdrop && this.backdrop) {
            this.backdrop.addEventListener('click', () => this.close());
        }
        
        // Escape key
        if (this.options.closeOnEscape) {
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.isOpen()) {
                    this.close();
                }
            });
        }
        
        // Focus trap
        if (this.options.trapFocus) {
            this.setupFocusTrap();
        }
    }

    open() {
        this.element.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        if (this.options.autoFocus) {
            this.focusFirstElement();
        }
        
        // Animate in
        requestAnimationFrame(() => {
            if (this.backdrop) this.backdrop.classList.remove('opacity-0');
            if (this.content) this.content.classList.remove('opacity-0', 'scale-95');
        });
        
        // Dispatch event
        this.element.dispatchEvent(new CustomEvent('modal:opened'));
    }

    close() {
        if (this.backdrop) this.backdrop.classList.add('opacity-0');
        if (this.content) this.content.classList.add('opacity-0', 'scale-95');
        
        setTimeout(() => {
            this.element.classList.add('hidden');
            document.body.style.overflow = '';
        }, 200);
        
        // Dispatch event
        this.element.dispatchEvent(new CustomEvent('modal:closed'));
    }

    isOpen() {
        return !this.element.classList.contains('hidden');
    }

    setupFocusTrap() {
        const focusableElements = this.element.querySelectorAll(
            'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
        );
        
        if (focusableElements.length === 0) return;
        
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];
        
        this.element.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
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

    focusFirstElement() {
        const firstFocusable = this.element.querySelector(
            'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
        );
        if (firstFocusable) {
            firstFocusable.focus();
        }
    }

    destroy() {
        this.closeButtons.forEach(button => {
            button.removeEventListener('click', this.close);
        });
        
        if (this.backdrop) {
            this.backdrop.removeEventListener('click', this.close);
        }
    }
}

// Enhanced Card Component
class EnhancedCard extends Component {
    get defaultOptions() {
        return {
            hoverEffect: true,
            clickable: false,
            expandable: false,
            showActions: false
        };
    }

    init() {
        this.setupCardBehavior();
        if (this.options.hoverEffect) {
            this.setupHoverEffects();
        }
    }

    setupCardBehavior() {
        if (this.options.clickable) {
            this.element.style.cursor = 'pointer';
            this.element.addEventListener('click', (e) => {
                if (!e.target.closest('[data-card-action]')) {
                    this.handleCardClick(e);
                }
            });
        }
        
        if (this.options.expandable) {
            this.setupExpandableBehavior();
        }
        
        if (this.options.showActions) {
            this.setupCardActions();
        }
    }

    setupHoverEffects() {
        this.element.addEventListener('mouseenter', () => {
            this.element.classList.add('hover:scale-105', 'hover:shadow-xl');
        });
        
        this.element.addEventListener('mouseleave', () => {
            this.element.classList.remove('hover:scale-105', 'hover:shadow-xl');
        });
    }

    setupExpandableBehavior() {
        const expandButton = this.element.querySelector('[data-expand]');
        if (expandButton) {
            expandButton.addEventListener('click', () => {
                this.toggleExpand();
            });
        }
    }

    setupCardActions() {
        const actions = this.element.querySelectorAll('[data-card-action]');
        actions.forEach(action => {
            action.addEventListener('click', (e) => {
                e.stopPropagation();
                this.handleCardAction(action.dataset.cardAction, action);
            });
        });
    }

    handleCardClick(e) {
        const href = this.element.dataset.href;
        if (href) {
            window.location.href = href;
        }
    }

    handleCardAction(action, element) {
        switch (action) {
            case 'favorite':
                this.toggleFavorite(element);
                break;
            case 'share':
                this.shareCard();
                break;
            case 'bookmark':
                this.toggleBookmark(element);
                break;
            default:
                console.log(`Card action: ${action}`);
        }
    }

    toggleFavorite(element) {
        const isFavorited = element.classList.contains('text-red-500');
        if (isFavorited) {
            element.classList.remove('text-red-500');
            element.classList.add('text-gray-400');
        } else {
            element.classList.remove('text-gray-400');
            element.classList.add('text-red-500');
        }
    }

    toggleBookmark(element) {
        const isBookmarked = element.classList.contains('text-blue-500');
        if (isBookmarked) {
            element.classList.remove('text-blue-500');
            element.classList.add('text-gray-400');
        } else {
            element.classList.remove('text-gray-400');
            element.classList.add('text-blue-500');
        }
    }

    shareCard() {
        if (navigator.share) {
            navigator.share({
                title: this.element.dataset.title || 'Check this out',
                url: this.element.dataset.url || window.location.href
            });
        } else {
            // Fallback to copying URL
            navigator.clipboard.writeText(window.location.href);
            if (window.showToast) {
                window.showToast('URL berhasil disalin', 'success');
            }
        }
    }

    toggleExpand() {
        const content = this.element.querySelector('[data-expandable-content]');
        const button = this.element.querySelector('[data-expand]');
        
        if (content && button) {
            const isExpanded = content.classList.contains('hidden');
            
            if (isExpanded) {
                content.classList.remove('hidden');
                button.innerHTML = 'Sembunyikan';
            } else {
                content.classList.add('hidden');
                button.innerHTML = 'Lihat Lebih';
            }
        }
    }

    destroy() {
        // Cleanup event listeners
        this.element.removeEventListener('click', this.handleCardClick);
    }
}

// Enhanced Tooltip Component
class EnhancedTooltip extends Component {
    get defaultOptions() {
        return {
            position: 'top',
            delay: 200,
            theme: 'dark',
            arrow: true,
            interactive: false
        };
    }

    init() {
        this.tooltip = null;
        this.timeout = null;
        this.setupTooltipBehavior();
    }

    setupTooltipBehavior() {
        this.element.addEventListener('mouseenter', () => this.showTooltip());
        this.element.addEventListener('mouseleave', () => this.hideTooltip());
        this.element.addEventListener('focus', () => this.showTooltip());
        this.element.addEventListener('blur', () => this.hideTooltip());
    }

    showTooltip() {
        this.timeout = setTimeout(() => {
            this.createTooltip();
            this.positionTooltip();
            this.animateIn();
        }, this.options.delay);
    }

    hideTooltip() {
        if (this.timeout) {
            clearTimeout(this.timeout);
            this.timeout = null;
        }
        
        if (this.tooltip) {
            this.animateOut();
        }
    }

    createTooltip() {
        const text = this.element.getAttribute('data-tooltip');
        if (!text) return;
        
        this.tooltip = document.createElement('div');
        this.tooltip.className = `fixed z-50 px-3 py-2 text-sm text-white bg-gray-900 rounded-lg shadow-lg opacity-0 pointer-events-none transition-all duration-200 whitespace-nowrap`;
        this.tooltip.textContent = text;
        
        if (this.options.arrow) {
            const arrow = document.createElement('div');
            arrow.className = 'absolute w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900';
            this.tooltip.appendChild(arrow);
        }
        
        document.body.appendChild(this.tooltip);
    }

    positionTooltip() {
        if (!this.tooltip) return;
        
        const rect = this.element.getBoundingClientRect();
        const tooltipRect = this.tooltip.getBoundingClientRect();
        
        let left, top;
        
        switch (this.options.position) {
            case 'top':
                left = rect.left + (rect.width / 2) - (tooltipRect.width / 2);
                top = rect.top - tooltipRect.height - 8;
                break;
            case 'bottom':
                left = rect.left + (rect.width / 2) - (tooltipRect.width / 2);
                top = rect.bottom + 8;
                break;
            case 'left':
                left = rect.left - tooltipRect.width - 8;
                top = rect.top + (rect.height / 2) - (tooltipRect.height / 2);
                break;
            case 'right':
                left = rect.right + 8;
                top = rect.top + (rect.height / 2) - (tooltipRect.height / 2);
                break;
        }
        
        // Adjust if tooltip goes off screen
        if (left < 8) left = 8;
        if (left + tooltipRect.width > window.innerWidth - 8) {
            left = window.innerWidth - tooltipRect.width - 8;
        }
        if (top < 8) top = 8;
        if (top + tooltipRect.height > window.innerHeight - 8) {
            top = window.innerHeight - tooltipRect.height - 8;
        }
        
        this.tooltip.style.left = `${left}px`;
        this.tooltip.style.top = `${top}px`;
    }

    animateIn() {
        if (this.tooltip) {
            this.tooltip.classList.remove('opacity-0');
            this.tooltip.classList.add('opacity-100');
        }
    }

    animateOut() {
        if (this.tooltip) {
            this.tooltip.classList.add('opacity-0');
            this.tooltip.classList.remove('opacity-100');
            
            setTimeout(() => {
                if (this.tooltip && this.tooltip.parentNode) {
                    this.tooltip.parentNode.removeChild(this.tooltip);
                }
                this.tooltip = null;
            }, 200);
        }
    }

    destroy() {
        this.hideTooltip();
        this.element.removeEventListener('mouseenter', this.showTooltip);
        this.element.removeEventListener('mouseleave', this.hideTooltip);
        this.element.removeEventListener('focus', this.showTooltip);
        this.element.removeEventListener('blur', this.hideTooltip);
    }
}

// Component Factory
class ComponentFactory {
    static create(type, element, options = {}) {
        switch (type) {
            case 'button':
                return new EnhancedButton(element, options);
            case 'form':
                return new EnhancedForm(element, options);
            case 'modal':
                return new EnhancedModal(element, options);
            case 'card':
                return new EnhancedCard(element, options);
            case 'tooltip':
                return new EnhancedTooltip(element, options);
            default:
                throw new Error(`Unknown component type: ${type}`);
        }
    }
    
    static initializeAll() {
        // Auto-initialize components based on data attributes
        document.querySelectorAll('[data-component]').forEach(element => {
            const type = element.dataset.component;
            const options = this.parseOptions(element.dataset.options);
            ComponentFactory.create(type, element, options);
        });
    }
    
    static parseOptions(optionsString) {
        if (!optionsString) return {};
        
        try {
            return JSON.parse(optionsString);
        } catch (e) {
            console.warn('Invalid options JSON:', optionsString);
            return {};
        }
    }
}

// Initialize components when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    ComponentFactory.initializeAll();
});

// Export components
export {
    Component,
    EnhancedButton,
    EnhancedForm,
    EnhancedModal,
    EnhancedCard,
    EnhancedTooltip,
    ComponentFactory
};
