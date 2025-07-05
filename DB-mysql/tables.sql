CREATE TABLE `blood_donation_donor` (
  `blood_donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`blood_donor_id`),
  KEY `campaign_id` (`campaign_id`),
  KEY `donor_id` (`donor_id`),
  CONSTRAINT `blood_donation_donor_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`),
  CONSTRAINT `blood_donation_donor_ibfk_2` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `campaign_name` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `date` date DEFAULT NULL,
  `organizer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`campaign_id`),
  KEY `organizer_id` (`organizer_id`),
  CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `contact_us` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`donor_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `eligibility` (
  `donor_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `eligibility_1` varchar(20) DEFAULT 'pending',
  `eligibility_2` varchar(20) DEFAULT 'pending',
  PRIMARY KEY (`donor_id`,`campaign_id`),
  KEY `campaign_id` (`campaign_id`),
  CONSTRAINT `eligibility_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`),
  CONSTRAINT `eligibility_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `eligibilityform` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `previous_donation` tinyint(1) DEFAULT NULL,
  `chronic_illnesses` varchar(255) DEFAULT NULL,
  `recent_surgeries` text DEFAULT NULL,
  `current_medications` text DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `blood_transfusion` varchar(255) DEFAULT NULL,
  `smoking_alcohol` varchar(255) DEFAULT NULL,
  `recent_travel` text DEFAULT NULL,
  `tattoos_piercings` varchar(255) DEFAULT NULL,
  `risk_behavior` tinyint(1) DEFAULT NULL,
  `current_symptoms` text DEFAULT NULL,
  `recent_illnesses` text DEFAULT NULL,
  `pregnancy_status` varchar(255) DEFAULT NULL,
  `valid_id` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`form_id`),
  KEY `donor_id` (`donor_id`),
  KEY `campaign_id` (`campaign_id`),
  CONSTRAINT `eligibilityform_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`),
  CONSTRAINT `eligibilityform_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `medical_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `surgeries` text DEFAULT NULL,
  `illnesses` text DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `donor_id` (`donor_id`),
  CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT 'donor',
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
