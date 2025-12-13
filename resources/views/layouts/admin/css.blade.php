  <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <style>
      /* Avatar di tabel */
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

      /* Status badge */
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

      /* ======== TABLE STYLING ======== */
      table {
          width: 100%;
          border-collapse: collapse;
          border-radius: 8px;
          overflow: hidden;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
          background-color: #ffffff;
      }

      thead {
          background: linear-gradient(90deg, #a8d8ff, #d6edff);
          color: #003366;
          font-weight: 600;
          text-align: center;
      }

      th,
      td {
          padding: 12px 15px;
          text-align: center;
          border-bottom: 1px solid #e3f0ff;
      }

      tr:nth-child(even) td {
          background-color: #f8fcff;
      }

      tr:hover td {
          background-color: #eaf6ff;
      }

      th {
          border-bottom: 2px solid #cfe8ff;
      }

      /* ======== BUTTON AKSI ======== */
      .action-btns {
          display: flex;
          justify-content: center;
          gap: 8px;
      }

      .action-btns .btn {
          border: none;
          font-size: 0.9rem;
          padding: 6px 10px;
          border-radius: 6px;
          color: white;
          cursor: pointer;
          transition: all 0.3s ease;
      }

      .action-btns .btn i {
          margin: 0;
      }

      .action-btns .btn-edit {
          background-color: #2d9cdb;
      }

      .action-btns .btn-edit:hover {
          background-color: #1b7bbf;
      }

      .action-btns .btn-delete {
          background-color: #e63946;
      }

      .action-btns .btn-delete:hover {
          background-color: #c62828;
      }
  </style>
