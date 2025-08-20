

<style>
    @media (max-width: 768px) {
        table.min-w-full thead {
            display: none;
        }
        table.min-w-full, table.min-w-full tbody, table.min-w-full tr, table.min-w-full td {
            display: block !important;
            width: 100% !important;
        }
        table.min-w-full tr {
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #f3f4f6;
            border-radius: 0.5rem;
            background: #fff;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }
        table.min-w-full td {
            text-align: left !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
            position: relative;
            min-height: 48px;
            border: none !important;
        }
        table.min-w-full td:before {
            content: attr(data-label) ": ";
            font-weight: 600;
            color: #6b7280;
            display: block;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    }
</style>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
    @media (max-width: 768px) {
        table.min-w-full thead {
            display: none;
        }
        table.min-w-full, table.min-w-full tbody, table.min-w-full tr, table.min-w-full td {
            display: block !important;
            width: 100% !important;
        }
        table.min-w-full tr {
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #f3f4f6;
            border-radius: 0.5rem;
            background: #fff;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }
        table.min-w-full td {
            text-align: left !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
            position: relative;
            min-height: 48px;
            border: none !important;
        }
        table.min-w-full td:before {
            content: attr(data-label) ": ";
            font-weight: 600;
            color: #6b7280;
            display: block;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    }
    </style>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const journalSelect = document.getElementById('journalSelect');
        const dateInput = document.getElementById('dateInput');
        const searchForm = document.getElementById('searchForm');
        const searchSpinner = document.getElementById('searchSpinner');
        const searchBtn = document.getElementById('searchBtn');
        let searchTimeout;
    
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchSpinner.classList.remove('hidden');
            searchTimeout = setTimeout(() => {
                searchForm.submit();
            }, 800);
        });
    
        journalSelect.addEventListener('change', function() {
            searchForm.submit();
        });
    
        dateInput.addEventListener('change', function() {
            searchForm.submit();
        });
    
        searchForm.addEventListener('submit', function() {
            searchBtn.disabled = true;
            searchBtn.innerHTML = `
                <svg class="animate-spin h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Mencari...
            `;
            searchBtn.classList.add('opacity-75', 'cursor-not-allowed');
        });
    });
    
    function openDeleteModal(id, title) {
        const modal = document.getElementById('deleteModal');
        const modalContent = document.getElementById('modalContent');
        const deleteForm = document.getElementById('deleteForm');
        const deleteItemTitle = document.getElementById('deleteItemTitle');
        deleteForm.action = `{{ route('publikasi.index') }}/${id}`;
        deleteItemTitle.textContent = title;
        modal.classList.remove('hidden');
        document.body.classList.add('modal-open');
        setTimeout(() => {
            modalContent.classList.add('modal-content-enter');
        }, 10);
    }
    
    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const modalContent = document.getElementById('modalContent');
        modalContent.classList.remove('modal-content-enter');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('modal-open');
        }, 200);
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
    </script>