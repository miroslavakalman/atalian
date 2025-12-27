<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #f8f9fa;
            padding: 20px 0;
        }
        .nav-link.active {
            background-color: #0d6efd;
            color: white !important;
        }
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
        .status-new { background-color: #cfe2ff; color: #084298; }
        .status-reviewed { background-color: #d1e7dd; color: #0a3622; }
        .status-invited { background-color: #d1e7dd; color: #0a3622; }
        .status-rejected { background-color: #f8d7da; color: #58151c; }
        .status-archived { background-color: #e2e3e5; color: #2b2f32; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="px-3">
                    <h4>Админ-панель</h4>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/career*') ? 'active' : '' }}" 
                               href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-person-badge"></i> Отклики на вакансии
                                @php
                                    $newCount = \App\Models\CareerSubmission::where('status', 'new')->count();
                                @endphp
                                @if($newCount > 0)
                                    <span class="badge bg-danger">{{ $newCount }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/contact*') ? 'active' : '' }}" 
                            href="{{ route('admin.contact.index') }}">
                                <i class="bi bi-envelope"></i> Обращения с сайта
                                @php
                                    $newContacts = \App\Models\ContactSubmission::where('status', 'new')->count();
                                @endphp
                                @if($newContacts > 0)
                                    <span class="badge bg-danger">{{ $newContacts }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                <i class="bi bi-arrow-left"></i> На сайт
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-10">
                <nav class="navbar navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <span class="navbar-brand">Управление заявками</span>
                        <div class="d-flex">
                            <span class="navbar-text me-3">
                                {{ Auth::user()->name }}
                            </span>
                            <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </nav>

                <main class="p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Подтверждение удаления
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Вы уверены, что хотите удалить эту заявку?')) {
                        e.preventDefault();
                    }
                });
            });

            // Выбор всех чекбоксов
            const selectAll = document.getElementById('select-all');
            if (selectAll) {
                selectAll.addEventListener('change', function() {
                    document.querySelectorAll('.submission-checkbox').forEach(cb => {
                        cb.checked = this.checked;
                    });
                });
            }
        });
    </script>
</body>
</html>