-- MAPALA Arga Dahana Management System
-- MySQL 8.0+ | Import this file into a new database.
CREATE DATABASE IF NOT EXISTS arga_dahana
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE arga_dahana;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE roles (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60) NOT NULL UNIQUE,
  description VARCHAR(255) NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE permissions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  description VARCHAR(255) NULL
) ENGINE=InnoDB;

CREATE TABLE role_user (
  role_id BIGINT UNSIGNED NOT NULL,
  user_id BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (role_id, user_id),
  CONSTRAINT fk_role_user_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE permission_role (
  permission_id BIGINT UNSIGNED NOT NULL,
  role_id BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (permission_id, role_id),
  CONSTRAINT fk_permission_role_permission FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
  CONSTRAINT fk_permission_role_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE users (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  email_verified_at DATETIME NULL,
  last_login_at DATETIME NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_users_active (is_active)
) ENGINE=InnoDB;

ALTER TABLE role_user
  ADD CONSTRAINT fk_role_user_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;

CREATE TABLE member_statuses (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE divisions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  description TEXT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE members (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NULL UNIQUE,
  member_number VARCHAR(40) NOT NULL UNIQUE,
  full_name VARCHAR(150) NOT NULL,
  nim VARCHAR(40) NULL,
  faculty VARCHAR(120) NULL,
  study_program VARCHAR(120) NULL,
  cohort_year YEAR NULL,
  gender ENUM('L','P','Tidak disebutkan') NOT NULL DEFAULT 'Tidak disebutkan',
  birth_date DATE NULL,
  phone VARCHAR(30) NULL,
  address TEXT NULL,
  photo_path VARCHAR(255) NULL,
  status_id BIGINT UNSIGNED NULL,
  division_id BIGINT UNSIGNED NULL,
  joined_at DATE NULL,
  notes TEXT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_members_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  CONSTRAINT fk_members_status FOREIGN KEY (status_id) REFERENCES member_statuses(id) ON DELETE SET NULL,
  CONSTRAINT fk_members_division FOREIGN KEY (division_id) REFERENCES divisions(id) ON DELETE SET NULL,
  INDEX idx_members_name (full_name),
  INDEX idx_members_cohort (cohort_year)
) ENGINE=InnoDB;

CREATE TABLE periods (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  is_current TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CHECK (end_date >= start_date)
) ENGINE=InnoDB;

CREATE TABLE positions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  level_order INT NOT NULL DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE managements (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  member_id BIGINT UNSIGNED NOT NULL,
  position_id BIGINT UNSIGNED NOT NULL,
  period_id BIGINT UNSIGNED NOT NULL,
  division_id BIGINT UNSIGNED NULL,
  started_at DATE NULL,
  ended_at DATE NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_management_member FOREIGN KEY (member_id) REFERENCES members(id),
  CONSTRAINT fk_management_position FOREIGN KEY (position_id) REFERENCES positions(id),
  CONSTRAINT fk_management_period FOREIGN KEY (period_id) REFERENCES periods(id),
  CONSTRAINT fk_management_division FOREIGN KEY (division_id) REFERENCES divisions(id) ON DELETE SET NULL,
  INDEX idx_management_period (period_id)
) ENGINE=InnoDB;

CREATE TABLE activity_categories (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE activities (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id BIGINT UNSIGNED NULL,
  title VARCHAR(180) NOT NULL,
  slug VARCHAR(200) NOT NULL UNIQUE,
  description TEXT NULL,
  location VARCHAR(180) NULL,
  starts_at DATETIME NOT NULL,
  ends_at DATETIME NULL,
  quota INT UNSIGNED NULL,
  status ENUM('draft','published','ongoing','completed','cancelled') NOT NULL DEFAULT 'draft',
  created_by BIGINT UNSIGNED NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_activities_category FOREIGN KEY (category_id) REFERENCES activity_categories(id) ON DELETE SET NULL,
  CONSTRAINT fk_activities_creator FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_activities_date (starts_at),
  INDEX idx_activities_status (status)
) ENGINE=InnoDB;

CREATE TABLE activity_participants (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  activity_id BIGINT UNSIGNED NOT NULL,
  member_id BIGINT UNSIGNED NOT NULL,
  registration_status ENUM('registered','approved','rejected','withdrawn') NOT NULL DEFAULT 'registered',
  registered_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uq_activity_member (activity_id, member_id),
  CONSTRAINT fk_participant_activity FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE,
  CONSTRAINT fk_participant_member FOREIGN KEY (member_id) REFERENCES members(id)
) ENGINE=InnoDB;

CREATE TABLE attendances (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  activity_id BIGINT UNSIGNED NOT NULL,
  member_id BIGINT UNSIGNED NOT NULL,
  attendance_status ENUM('present','excused','absent','late') NOT NULL,
  checked_at DATETIME NULL,
  checked_by BIGINT UNSIGNED NULL,
  notes VARCHAR(255) NULL,
  UNIQUE KEY uq_attendance_activity_member (activity_id, member_id),
  CONSTRAINT fk_attendance_activity FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE,
  CONSTRAINT fk_attendance_member FOREIGN KEY (member_id) REFERENCES members(id),
  CONSTRAINT fk_attendance_checker FOREIGN KEY (checked_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE inventory_categories (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  description TEXT NULL
) ENGINE=InnoDB;

CREATE TABLE inventory_items (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id BIGINT UNSIGNED NULL,
  item_code VARCHAR(60) NOT NULL UNIQUE,
  name VARCHAR(160) NOT NULL,
  description TEXT NULL,
  total_stock INT UNSIGNED NOT NULL DEFAULT 0,
  available_stock INT UNSIGNED NOT NULL DEFAULT 0,
  condition_status ENUM('good','minor_damage','damaged','maintenance') NOT NULL DEFAULT 'good',
  storage_location VARCHAR(160) NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_inventory_category FOREIGN KEY (category_id) REFERENCES inventory_categories(id) ON DELETE SET NULL,
  INDEX idx_inventory_name (name)
) ENGINE=InnoDB;

CREATE TABLE borrowings (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  member_id BIGINT UNSIGNED NOT NULL,
  requested_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  borrow_date DATE NOT NULL,
  due_date DATE NOT NULL,
  returned_at DATETIME NULL,
  status ENUM('pending','approved','rejected','borrowed','returned','overdue') NOT NULL DEFAULT 'pending',
  approved_by BIGINT UNSIGNED NULL,
  notes TEXT NULL,
  CONSTRAINT fk_borrowing_member FOREIGN KEY (member_id) REFERENCES members(id),
  CONSTRAINT fk_borrowing_approver FOREIGN KEY (approved_by) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_borrowings_status (status)
) ENGINE=InnoDB;

CREATE TABLE borrowing_details (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  borrowing_id BIGINT UNSIGNED NOT NULL,
  item_id BIGINT UNSIGNED NOT NULL,
  quantity INT UNSIGNED NOT NULL,
  returned_quantity INT UNSIGNED NOT NULL DEFAULT 0,
  item_condition_on_return ENUM('good','minor_damage','damaged','not_returned') NULL,
  CONSTRAINT fk_borrow_detail_borrowing FOREIGN KEY (borrowing_id) REFERENCES borrowings(id) ON DELETE CASCADE,
  CONSTRAINT fk_borrow_detail_item FOREIGN KEY (item_id) REFERENCES inventory_items(id),
  INDEX idx_borrow_detail_item (item_id)
) ENGINE=InnoDB;

CREATE TABLE inventory_movements (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  item_id BIGINT UNSIGNED NOT NULL,
  movement_type ENUM('in','out','adjustment','return','damage') NOT NULL,
  quantity INT NOT NULL,
  reference_type VARCHAR(60) NULL,
  reference_id BIGINT UNSIGNED NULL,
  notes VARCHAR(255) NULL,
  created_by BIGINT UNSIGNED NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_inventory_movement_item FOREIGN KEY (item_id) REFERENCES inventory_items(id),
  CONSTRAINT fk_inventory_movement_user FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE financial_categories (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  transaction_type ENUM('income','expense') NOT NULL,
  UNIQUE KEY uq_financial_category (name, transaction_type)
) ENGINE=InnoDB;

CREATE TABLE financial_accounts (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  account_type ENUM('cash','bank','other') NOT NULL DEFAULT 'cash',
  is_active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB;

CREATE TABLE transactions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  account_id BIGINT UNSIGNED NOT NULL,
  category_id BIGINT UNSIGNED NOT NULL,
  transaction_type ENUM('income','expense') NOT NULL,
  amount DECIMAL(15,2) NOT NULL,
  transaction_date DATE NOT NULL,
  description TEXT NULL,
  proof_path VARCHAR(255) NULL,
  status ENUM('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  created_by BIGINT UNSIGNED NULL,
  approved_by BIGINT UNSIGNED NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_transaction_account FOREIGN KEY (account_id) REFERENCES financial_accounts(id),
  CONSTRAINT fk_transaction_category FOREIGN KEY (category_id) REFERENCES financial_categories(id),
  CONSTRAINT fk_transaction_creator FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
  CONSTRAINT fk_transaction_approver FOREIGN KEY (approved_by) REFERENCES users(id) ON DELETE SET NULL,
  CHECK (amount > 0),
  INDEX idx_transaction_date (transaction_date),
  INDEX idx_transaction_status (status)
) ENGINE=InnoDB;

CREATE TABLE dues (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(120) NOT NULL,
  amount DECIMAL(15,2) NOT NULL,
  due_date DATE NULL,
  period_label VARCHAR(80) NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE dues_payments (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  dues_id BIGINT UNSIGNED NOT NULL,
  member_id BIGINT UNSIGNED NOT NULL,
  amount DECIMAL(15,2) NOT NULL,
  paid_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  proof_path VARCHAR(255) NULL,
  status ENUM('pending','verified','rejected') NOT NULL DEFAULT 'pending',
  verified_by BIGINT UNSIGNED NULL,
  CONSTRAINT fk_dues_payment_dues FOREIGN KEY (dues_id) REFERENCES dues(id),
  CONSTRAINT fk_dues_payment_member FOREIGN KEY (member_id) REFERENCES members(id),
  CONSTRAINT fk_dues_payment_verifier FOREIGN KEY (verified_by) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_dues_payment_member (member_id)
) ENGINE=InnoDB;

CREATE TABLE letters (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  letter_number VARCHAR(100) NOT NULL UNIQUE,
  letter_type ENUM('incoming','outgoing') NOT NULL,
  subject VARCHAR(200) NOT NULL,
  letter_date DATE NOT NULL,
  sender_recipient VARCHAR(180) NULL,
  file_path VARCHAR(255) NULL,
  notes TEXT NULL,
  created_by BIGINT UNSIGNED NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_letters_creator FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE documents (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  category VARCHAR(100) NULL,
  file_path VARCHAR(255) NOT NULL,
  visibility ENUM('public','member','management','private') NOT NULL DEFAULT 'management',
  uploaded_by BIGINT UNSIGNED NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_documents_uploader FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE recruitments (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  description TEXT NULL,
  opens_at DATETIME NOT NULL,
  closes_at DATETIME NOT NULL,
  status ENUM('draft','open','closed','completed') NOT NULL DEFAULT 'draft',
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE applicants (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  recruitment_id BIGINT UNSIGNED NOT NULL,
  full_name VARCHAR(150) NOT NULL,
  nim VARCHAR(40) NULL,
  email VARCHAR(190) NOT NULL,
  phone VARCHAR(30) NULL,
  study_program VARCHAR(120) NULL,
  motivation TEXT NULL,
  status ENUM('submitted','verified','rejected','accepted','enrolled') NOT NULL DEFAULT 'submitted',
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_applicant_recruitment FOREIGN KEY (recruitment_id) REFERENCES recruitments(id),
  INDEX idx_applicant_email (email)
) ENGINE=InnoDB;

CREATE TABLE applicant_documents (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  applicant_id BIGINT UNSIGNED NOT NULL,
  document_type VARCHAR(80) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  CONSTRAINT fk_applicant_document FOREIGN KEY (applicant_id) REFERENCES applicants(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE selection_results (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  applicant_id BIGINT UNSIGNED NOT NULL,
  stage VARCHAR(100) NOT NULL,
  result ENUM('pending','passed','failed') NOT NULL DEFAULT 'pending',
  notes TEXT NULL,
  assessed_by BIGINT UNSIGNED NULL,
  assessed_at DATETIME NULL,
  CONSTRAINT fk_selection_applicant FOREIGN KEY (applicant_id) REFERENCES applicants(id) ON DELETE CASCADE,
  CONSTRAINT fk_selection_assessor FOREIGN KEY (assessed_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE expeditions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  location VARCHAR(180) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NULL,
  route_description TEXT NULL,
  coordinator_id BIGINT UNSIGNED NULL,
  status ENUM('planned','ongoing','completed','cancelled') NOT NULL DEFAULT 'planned',
  report TEXT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_expedition_coordinator FOREIGN KEY (coordinator_id) REFERENCES members(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE expedition_participants (
  expedition_id BIGINT UNSIGNED NOT NULL,
  member_id BIGINT UNSIGNED NOT NULL,
  role_on_expedition VARCHAR(100) NULL,
  PRIMARY KEY (expedition_id, member_id),
  CONSTRAINT fk_expedition_participant_expedition FOREIGN KEY (expedition_id) REFERENCES expeditions(id) ON DELETE CASCADE,
  CONSTRAINT fk_expedition_participant_member FOREIGN KEY (member_id) REFERENCES members(id)
) ENGINE=InnoDB;

CREATE TABLE expedition_logs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  expedition_id BIGINT UNSIGNED NOT NULL,
  logged_at DATETIME NOT NULL,
  location_note VARCHAR(180) NULL,
  content TEXT NOT NULL,
  created_by BIGINT UNSIGNED NULL,
  CONSTRAINT fk_expedition_log_expedition FOREIGN KEY (expedition_id) REFERENCES expeditions(id) ON DELETE CASCADE,
  CONSTRAINT fk_expedition_log_creator FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE articles (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  author_id BIGINT UNSIGNED NULL,
  title VARCHAR(200) NOT NULL,
  slug VARCHAR(220) NOT NULL UNIQUE,
  excerpt TEXT NULL,
  content LONGTEXT NOT NULL,
  cover_path VARCHAR(255) NULL,
  status ENUM('draft','published','archived') NOT NULL DEFAULT 'draft',
  published_at DATETIME NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_article_author FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE galleries (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  description TEXT NULL,
  event_date DATE NULL,
  is_published TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE gallery_photos (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  gallery_id BIGINT UNSIGNED NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  caption VARCHAR(255) NULL,
  sort_order INT NOT NULL DEFAULT 0,
  CONSTRAINT fk_gallery_photo_gallery FOREIGN KEY (gallery_id) REFERENCES galleries(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE announcements (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  content TEXT NOT NULL,
  audience ENUM('public','members','management') NOT NULL DEFAULT 'members',
  published_at DATETIME NULL,
  expires_at DATETIME NULL,
  created_by BIGINT UNSIGNED NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_announcement_creator FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE notifications (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NOT NULL,
  title VARCHAR(180) NOT NULL,
  message TEXT NOT NULL,
  target_url VARCHAR(255) NULL,
  read_at DATETIME NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_notification_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  INDEX idx_notification_unread (user_id, read_at)
) ENGINE=InnoDB;

CREATE TABLE activity_logs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NULL,
  action VARCHAR(120) NOT NULL,
  entity_type VARCHAR(100) NULL,
  entity_id BIGINT UNSIGNED NULL,
  ip_address VARCHAR(45) NULL,
  user_agent VARCHAR(255) NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_activity_log_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_activity_log_created (created_at)
) ENGINE=InnoDB;

CREATE TABLE settings (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  setting_key VARCHAR(120) NOT NULL UNIQUE,
  setting_value TEXT NULL,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

SET FOREIGN_KEY_CHECKS = 1;

-- Initial reference data. Create the first administrator separately using password_hash().
INSERT IGNORE INTO roles (name, description) VALUES
('super_admin','Akses penuh sistem'),
('ketua_umum','Monitoring dan persetujuan organisasi'),
('wakil_ketua','Koordinasi organisasi'),
('sekretaris','Administrasi dan arsip'),
('bendahara','Keuangan organisasi'),
('koordinator_divisi','Pengelolaan divisi'),
('pengurus','Operasional sesuai penugasan'),
('anggota','Akses anggota'),
('calon_anggota','Akses pendaftaran');

INSERT IGNORE INTO member_statuses (name) VALUES
('Aktif'),('Tidak Aktif'),('Alumni'),('Cuti');

INSERT IGNORE INTO divisions (name, description) VALUES
('Gunung Hutan','Kegiatan pendakian dan navigasi darat'),
('Rock Climbing','Kegiatan panjat tebing'),
('Caving','Kegiatan susur gua'),
('Rafting','Kegiatan arung jeram'),
('Konservasi','Pelestarian dan edukasi lingkungan');

INSERT IGNORE INTO positions (name, level_order) VALUES
('Ketua Umum',1),('Wakil Ketua',2),('Sekretaris',3),('Bendahara',4),
('Koordinator Divisi',5),('Anggota Pengurus',6);

INSERT IGNORE INTO activity_categories (name) VALUES
('Pendidikan'),('Ekspedisi'),('Pendakian'),('Konservasi'),
('Bakti Sosial'),('Latihan Rutin'),('Rapat');

INSERT IGNORE INTO inventory_categories (name) VALUES
('Peralatan Pendakian'),('Peralatan Panjat'),('Peralatan Camping'),
('Peralatan P3K'),('Peralatan Navigasi'),('Peralatan Lainnya');

INSERT IGNORE INTO financial_accounts (name, account_type) VALUES
('Kas Tunai','cash'),('Rekening Organisasi','bank');

INSERT IGNORE INTO settings (setting_key, setting_value) VALUES
('organization_name','MAPALA Arga Dahana'),
('campus_name','Universitas Muria Kudus'),
('theme_primary','#183D2B'),
('theme_accent','#8DAA72');
