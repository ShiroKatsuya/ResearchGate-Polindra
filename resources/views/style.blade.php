

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
    /* Modal helpers */
    .modal-content-enter {
        opacity: 1 !important;
        transform: scale(1) !important;
    }
    .modal-open {
        overflow: hidden;
    }
    #modalContent {
        will-change: transform, opacity;
    }
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
        const statusSelect = document.getElementById('statusSelect');
        const studentNameInput = document.getElementById('studentNameInput');
        const yearInput = document.getElementById('yearInput');
        const startDateInput = document.getElementById('startDateInput');
        const endDateInput = document.getElementById('endDateInput');
        const searchForm = document.getElementById('searchForm');
        const searchSpinner = document.getElementById('searchSpinner');
        const searchBtn = document.getElementById('searchBtn');
        let searchTimeout;

        if (searchInput && searchForm && searchSpinner) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchSpinner.classList.remove('hidden');
                searchTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 800);
            });
        }

        if (journalSelect && searchForm) {
            journalSelect.addEventListener('change', function() {
                searchForm.submit();
            });
        }

        if (dateInput && searchForm) {
            dateInput.addEventListener('change', function() {
                searchForm.submit();
            });
        }

        if (statusSelect && searchForm) {
            statusSelect.addEventListener('change', function() {
                searchForm.submit();
            });
        }

        if (studentNameInput && searchForm) {
            studentNameInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchSpinner && searchSpinner.classList.remove('hidden');
                searchTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 600);
            });
        }

        if (yearInput && searchForm) {
            yearInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchSpinner && searchSpinner.classList.remove('hidden');
                searchTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 400);
            });
        }

        if (startDateInput && searchForm) {
            startDateInput.addEventListener('change', function() {
                searchForm.submit();
            });
        }

        if (endDateInput && searchForm) {
            endDateInput.addEventListener('change', function() {
                searchForm.submit();
            });
        }

        if (searchForm && searchBtn) {
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
        }
    });
    
    function openDeleteModal(id, title) {
        const modal = document.getElementById('deleteModal');
        const modalContent = document.getElementById('modalContent');
        const deleteForm = document.getElementById('deleteForm');
        const deleteItemTitle = document.getElementById('deleteItemTitle');

        // Determine current section and build correct destroy URL template
        const isPerangkatLunak = @json(request()->routeIs('perangkatlunak.*'));
        const isPerkenalan = @json(request()->routeIs('perkenalan.*'));
        const isStudent = @json(request()->routeIs('student.*'));
        const isProyek = @json(request()->routeIs('proyek.*'));
        const isPublikasi = @json(request()->routeIs('publikasi.*'));
        const isBerita = @json(request()->routeIs('berita.*'));

        const perangkatLunakDestroyTemplate = @json(route('perangkatlunak.destroy', ['id' => 'ID_PLACEHOLDER']));
        const perkenalanDestroyTemplate = @json(route('perkenalan.destroy', ['id' => 'ID_PLACEHOLDER']));
        const proyekDestroyTemplate = @json(route('proyek.destroy', ['id' => 'ID_PLACEHOLDER']));
        const publikasiDestroyTemplate = @json(route('publikasi.destroy', ['id' => 'ID_PLACEHOLDER']));
        const beritaDestroyTemplate = @json(route('berita.destroy', ['id' => 'ID_PLACEHOLDER']));
        const studentDestroyTemplate = @json(route('student.destroy', ['id' => 'ID_PLACEHOLDER']));

        const template = isPerangkatLunak
            ? perangkatLunakDestroyTemplate
            : (isPerkenalan
                ? perkenalanDestroyTemplate
                : (isStudent
                    ? studentDestroyTemplate
                    : (isProyek
                        ? proyekDestroyTemplate
                        : (isPublikasi
                            ? publikasiDestroyTemplate
                            : (isBerita ? beritaDestroyTemplate : publikasiDestroyTemplate)))));

        deleteForm.action = template.replace('ID_PLACEHOLDER', id);
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