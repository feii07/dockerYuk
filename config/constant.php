<?php
//constant data
define("ACCOUNT", "1702272081");
define("DEFAULT_PROFILE", "/images/profile/photo/default.png");
define("DEFAULT_FILE_PREVIEW", "/images/folder.png");
define("GUEST_ID", 1);

// Status Event
define("NOT_CONFIRMED", 0);
define("ACTIVE", 1);
define("FINISHED", 2);
define("CLOSED", 3);
define("CANCELED", 4);
define("REJECTED", 5);

// Status User
define("DELETED", 0);
//ACTIVE, 1 -> gunakan yang ada pada status event
define("BLOCKED", 2);
define("WAITING", 3);

// Role User
define("GUEST", "guest");
define("ADMIN", "admin");
define("PARTICIPANT", "participant");
define("CAMPAIGNER", "campaigner");

//event
define("PETITION", "petition");
define("DONATION", "donation");

//petition type
define("BERLANGSUNG", "berlangsung");
define("MENANG", "menang");
define("SELESAI", "selesai");
define("PARTISIPASI", "partisipasi");
define("PETISI_SAYA", "petisi_saya");
define("DIBATALKAN", "dibatalkan");
define("BELUM_VALID", "belum_valid");

//Sort Petition
define("TANDA_TANGAN", "Jumlah Tanda Tangan");
define("EVENT_TERBARU", "Event Terbaru");
define("NONE", "None");

//sort table in petition
define("SIGNED_COLUMN", "signedCollected");
define("CREATED_COLUMN", "created_at");

//Sort donation
define("DEADLINE", "Tenggat Waktu");
define("SMALL_COLLECTED", "Sedikit Terkumpul");
define("MY_DONATION", "Donasi Saya");
define("PARTICIPATED_DONATION", "Ikut Serta");

//sort table in donation
define("DEADLINE_COLUMN", "deadline");
define("COLLECTED_COLUMN", "donationCollected");

//List User Admin
define("PENGAJUAN", "pengajuan");
define("SEMUA", "semua");
