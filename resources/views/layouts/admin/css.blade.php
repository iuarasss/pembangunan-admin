  <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        .table-avatar {
            display: flex;
            align-items: center;
        }

        .table-avatar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-full {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-part {
            background-color: #fef3c7;
            color: #92400e;
        }

        .table thead {
            background: #f8f9fa;
        }

        .action-btns .btn {
            border: none;
            font-size: 0.9rem;
            padding: 5px 8px;
        }

        .action-btns .btn i {
            margin: 0;
        }
    </style>
