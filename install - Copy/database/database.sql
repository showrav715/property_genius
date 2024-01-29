-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 06:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genius_realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 0,
  `photo` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `role_id`, `photo`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admins', 'admin@gmail.com', '01629552892', 0, 'MfB0s9Fm1674116890.jpg', '$2y$10$NSxBfIBeDdxRjisT83p/0uN4GN4LcbYvKzuazAfyekwPffExwBUpO', 1, '4hZaP0ddA1gRQXhS8acaKQAcv96HYAKdJHLYnwI9Rg6vAguMgGflNjj6DHxf', '2018-02-28 23:27:08', '2023-09-06 22:58:47'),
(10, 'ahammed imtiaze', 'imtiaz@gmail.com', '0123456789', 10, '3ddfDikp1678773154.jpg', '$2y$10$egKSRBA.b7X4swmRXy.7V.24rzSbDlTBzcSyQq/CVpxryUc.ZpVhK', 1, NULL, '2023-03-13 23:52:34', '2023-03-13 23:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_languages`
--

CREATE TABLE `admin_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `language` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_languages`
--

INSERT INTO `admin_languages` (`id`, `is_default`, `language`, `file`, `name`, `rtl`, `created_at`, `updated_at`) VALUES
(1, 1, 'En', '1603880510hWH6gk7S.json', '1603880510hWH6gk7S', 0, NULL, NULL),
(23, 0, 'BN', '1649840015gHLfDWu0.json', '1649840015gHLfDWu0', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_conversations`
--

CREATE TABLE `admin_user_conversations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_number` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_user_conversations`
--

INSERT INTO `admin_user_conversations` (`id`, `user_id`, `ticket_number`, `subject`, `message`, `attachment`, `created_at`, `updated_at`) VALUES
(25, 86, '#TKT822753', 'Deposit Problem', 'Please check my issue', 'ba7M6OiB1669785241.jpg', '2022-11-30 05:14:01', '2022-11-30 05:14:01'),
(26, 86, '#TKT755107', 'New Ticket', 'I am here for new ticket.', 'PeTPP15r1672735237.png', '2023-01-03 08:40:37', '2023-01-03 08:40:37'),
(27, 86, '#TKT753947', 'hello', 'here', 'BcZsXsix1674619571.png', '2023-01-25 04:06:11', '2023-01-25 04:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_messages`
--

CREATE TABLE `admin_user_messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `conversation_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_user_messages`
--

INSERT INTO `admin_user_messages` (`id`, `user_id`, `conversation_id`, `message`, `photo`, `created_at`, `updated_at`) VALUES
(48, 86, 25, 'dfgdfg', 'ba7M6OiB1669785241.jpg', '2022-11-30 05:14:01', '2022-11-30 05:14:01'),
(49, 0, 25, 'utyuty', 's8AsRglY1669785735.jpg', '2022-11-30 05:22:15', '2022-11-30 05:22:15'),
(50, 86, 25, 'drfgdfgd', 'MM8rLFDb1672723012.jpg', '2023-01-03 05:16:52', '2023-01-03 05:16:52'),
(51, 86, 25, 'hello', 'FqoXfxoX1672723030.jpg', '2023-01-03 05:17:10', '2023-01-03 05:17:10'),
(52, 86, 26, 'I am here for new ticket.', 'PeTPP15r1672735237.png', '2023-01-03 08:40:37', '2023-01-03 08:40:37'),
(53, 86, 27, 'here', 'BcZsXsix1674619571.png', '2023-01-25 04:06:11', '2023-01-25 04:06:11'),
(54, 86, 27, 'fdgfgh', NULL, '2023-09-06 23:54:53', '2023-09-06 23:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Amenities', 1, '2022-11-20 06:14:34', '2022-11-20 06:16:58'),
(4, 'Property Type', 1, '2022-11-22 05:43:44', '2022-11-22 05:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options`
--

CREATE TABLE `attribute_options` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute_options`
--

INSERT INTO `attribute_options` (`id`, `attribute_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'Auditorium', 1, '2022-11-22 05:44:12', '2022-11-22 05:44:12'),
(3, 4, 'Bar', 1, '2022-11-22 05:44:36', '2022-11-22 05:44:36'),
(4, 4, 'Cafe', 1, '2022-11-22 05:44:53', '2022-11-22 05:44:53'),
(5, 4, 'Ballroom', 1, '2022-11-22 05:45:01', '2022-11-22 05:45:01'),
(6, 4, 'Dance Studio', 1, '2022-11-22 05:45:08', '2022-11-22 05:45:08'),
(7, 4, 'Office', 1, '2022-11-22 05:45:18', '2022-11-22 05:45:18'),
(8, 4, 'Party Hall', 1, '2022-11-22 05:45:28', '2022-11-22 05:45:28'),
(9, 2, 'Air Conditioning', 1, '2022-11-22 05:46:35', '2022-11-22 05:46:35'),
(10, 2, 'Breakfast', 1, '2022-11-22 05:46:44', '2022-11-22 05:46:44'),
(11, 2, 'Kitchen', 1, '2022-11-22 05:46:51', '2022-11-22 05:46:51'),
(12, 2, 'Parking', 1, '2022-11-22 05:47:01', '2022-11-22 05:47:01'),
(13, 2, 'Pool', 1, '2022-11-22 05:47:08', '2022-11-22 05:47:08'),
(14, 2, 'Wi-Fi Internet', 1, '2022-11-22 05:47:16', '2022-11-22 05:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `source` varchar(191) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_tag` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `slug`, `details`, `photo`, `source`, `views`, `status`, `meta_tag`, `meta_description`, `tags`, `created_at`) VALUES
(24, 6, 'CRYPTO.COM APP LISTS IDEX (IDEX)', 'cryptocom-app-lists-idex-joining', 'IDEX (IDEX) is now listed in the Crypto.com App, joining the growing list of 250+ supported cryptocurrencies and stablecoins, including Bitcoin (BTC), Ether (ETH), Polkadot (DOT), Chainlink (LINK), VeChain (VET), USD Coin (USDC), and Crypto.org Coin (CRO). IDEX is the first Hybrid Liquidity DEX that blends the best of centralised and decentralised exchanges, with the performance and features of a traditional order book and the security and liquidity of an automated market maker (AMM). Users benefit from not having to pay additional network costs for placing or canceling orders. Placements are also processed in real time, enabling advanced trading. IDEX is an Ethereum token that powers the IDEX decentralised exchange. IDEX holders can stake tokens in order to help secure the protocol and earn rewards. Crypto.com App users can now purchase IDEX at true cost with USD, EUR, GBP, and 20+ fiat currencies, and spend it at over 80 million merchants globally using the Crypto.com Visa Card.\r\n\r\nOfficia doloribus hic aperiam culpa nisi, voluptatem voluptatibus!\r\n\r\nIDEX is the first Hybrid Liquidity DEX that blends the best of centralised and decentralised exchanges, with the performance and features of a traditional order book and the security and liquidity of an automated market maker (AMM). Users benefit from not having to pay additional network costs for placing or canceling orders. Placements are also processed in real time, enabling advanced trading', 'NXCvrdtG1695631686.jpg', 'www.geniusocean.com', 57, 1, 'Ethereum', NULL, 'DEX,exchanges,Ethereum', '2019-01-03 06:03:37'),
(29, 7, 'The First Margin Trading Race of 2022 Has Landed!', 'the-first-margin-trading-race-of-2022-has-landed', 'The Crypto.com Exchange’s first Margin Trading Race of 2022 is locked, loaded, and ready to go! If you haven’t Margin traded in a while, it’s time to shake off the dust. Here’s why: the first 500 users who Margin trade at least USD 100 of any pair will score USD 50 in CRO and the chance to win tickets to a PSG vs Real Madrid Champions League game. New and existing users with a Margin Trading account who have not made a Margin trade since 1 November 2021 are eligible for this campaign. Campaign Period: 14 January 2022 at 08:00 UTC - 26 January 2022 at 00:00 UTC How to participate: Sign in or sign up to the Crypto.com Exchange Open a Margin Wallet (if you are new to Margin Trading) Margin trade at least USD 100 of any pair (FAQ, How-to video) Register for the campaign here. The first 500 eligible users who Margin trade at least USD 100 during the Campaign Period will win a share of USD 25,000 in CRO. Among the winners, three lucky traders will each receive one pair of tickets to the PSG vs Real Madrid Champions League game on 15 February 2022 at Paris Saint-Germain’s homeground, Le Parc des Princes! &lt;&gt; What is Margin Trading? Margin Trading allows users to amplify their trading profits through borrowed funds during both up and down market movements. Users can access up to 3x leverage for eligible pairs. The Crypto.com Coin (CRO) powers Margin Trading with additional utility, offering preferential interest rates—as low as 0.008% per day—to users who stake CRO. Check out our step-by-step video guides on How to Set Up Your Margin Trading Account and Use your Margin Trading Account.\r\n\r\nOfficia doloribus hic aperiam culpa nisi, voluptatem voluptatibus!\r\nUseful Links: Join us on Telegram to connect with our community. Refer to this FAQ for the latest list of supported margin trading pairs. Refer to this Margin Trading FAQ for more details about borrowing limits, and interest rates. Notes: In addition to the following rules, please refer to the Official Rules for Sweepstakes for further rules regarding eligibility. The Margin Trading Campaign is offered by Crypto.com to Crypto.com Exchange users. Any trades that are executed through bad trading practices in Crypto.com’s absolute opinion, including but not limited to wash trades, false trading, self-dealing, or trades that display any attributes of market manipulation (“Disqualified Trades”) will not be counted towards the transaction volume of the participant. The links provided above to helpful information are for reference only. The Reward will be paid in CRO and will be credited into the winners’ Crypto.com Exchange CRO Wallet within 30 days after the Reward Period ends. The Paris Saint-Germain tickets will be e-mailed to the winners’ Crypto.com E-mail address 3-5 days prior to the game. Winners may be required to prove eligibility including proof of age, residence, and identity, which may include submitting a copy of his/her passport or similar government issued identification to collect the e-tickets. Crypto.com is not responsible for paying any additional fees associated with the redemption or usage of the prizes e.g including but not limited to personal expenses, taxes, etc. Margin trading geo-restrictions apply, please refer to this list for the excluded jurisdictions. The eligibility of participants will be verified by Crypto.com after the campaign ends and the lucky draw results will be published. Crypto.com reserves the right to cancel or amend the campaign rules at our sole discretion. All personal data collected is used strictly for verification purposes only. By accepting the prize, winners agree to the Privacy Notice of Crypto.com, which is published at crypto.com/en/privacy/global.html.', '38H7jCLh1695631645.jpg', 'winners agree to the Privacy Notice of Crypto.com', 4, 1, NULL, NULL, 'verification,Crypto', '2022-03-16 03:58:54'),
(30, 5, 'RUNE Exclusive Campaign Winner Announcement', 'rune-exclusive-campaign-winner-chance', 'We’re excited to the results of the RUNE, Ex users have the chance to win a share of the prize pool worth USD 50,000 in RUNE by depositing and trading the token. Congratulations to all the winners! You will soon receive an email from us. Part 1: RUNE (BEP2) Net Deposit Competition (USD 30,000 Prize Pool) The top 200 users ranked by RUNE (BEP2) Net Deposits* wins a share of USD 30,000, with the Rank 1 participant taking home USD 1,000 of RUNE. *RUNE (BEP2) Net Deposits = Deposits From External Exchanges and Wallets on BEP2 (RUNE) + Buys (RUNE) - Sells (RUNE) - Withdrawals (RUNE) Users can be rewarded for both Part 1 and Part 2 of the campaign. For more information about the promotion, please visit our blog. Note: The eligibility of participants will be verified by Crypto.com after the campaign ends.\r\n<br><br>\r\nOfficia doloribus hic aperiam culpa nisi, voluptatem voluptatibus!\r\n<br>\r\nWe’re excited to the results of the RUNE, Ex users have the chance to win a share of the prize pool worth USD 50,000 in RUNE by depositing and trading the token. Congratulations to all the winners! You will soon receive an email from us. Part 1: RUNE (BEP2) Net Deposit Competition (USD 30,000 Prize Pool) The top 200 users ranked by RUNE (BEP2) Net Deposits* wins a share of USD 30,000, with the Rank 1 participant taking home USD 1,000 of RUNE. *RUNE (BEP2) Net Deposits = Deposits From External Exchanges and Wallets on BEP2 (RUNE) + Buys (RUNE) - Sells (RUNE) - Withdrawals (RUNE) Users can be rewarded for both Part 1 and Part 2 of the campaign. For more information about the promotion, please visit our blog. Note: The eligibility of participants will be verified by Crypto.com after the campaign ends.', 'xdUmWRX61695631613.jpg', 'genius', 40, 1, NULL, NULL, NULL, '2022-03-16 04:01:58'),
(31, 5, 'RUNE Exclusive Campaign Winner Announcement', 'rune-exclusive-campaign-winner-announcement', 'We’re excited to the results of the RUNE, Ex users have the chance to win a share of the prize pool worth USD 50,000 in RUNE by depositing and trading the token. Congratulations to all the winners! You will soon receive an email from us. Part 1: RUNE (BEP2) Net Deposit Competition (USD 30,000 Prize Pool) The top 200 users ranked by RUNE (BEP2) Net Deposits* wins a share of USD 30,000, with the Rank 1 participant taking home USD 1,000 of RUNE. *RUNE (BEP2) Net Deposits = Deposits From External Exchanges and Wallets on BEP2 (RUNE) + Buys (RUNE) - Sells (RUNE) - Withdrawals (RUNE) Users can be rewarded for both Part 1 and Part 2 of the campaign. For more information about the promotion, please visit our blog. Note: The eligibility of participants will be verified by Crypto.com after the campaign ends.\r\n<br><br>\r\n<h4>Officia doloribus hic aperiam culpa nisi, voluptatem voluptatibus!</h4>\r\n<br>\r\nWe’re excited to the results of the RUNE, Ex users have the chance to win a share of the prize pool worth USD 50,000 in RUNE by depositing and trading the token. Congratulations to all the winners! You will soon receive an email from us. Part 1: RUNE (BEP2) Net Deposit Competition (USD 30,000 Prize Pool) The top 200 users ranked by RUNE (BEP2) Net Deposits* wins a share of USD 30,000, with the Rank 1 participant taking home USD 1,000 of RUNE. *RUNE (BEP2) Net Deposits = Deposits From External Exchanges and Wallets on BEP2 (RUNE) + Buys (RUNE) - Sells (RUNE) - Withdrawals (RUNE) Users can be rewarded for both Part 1 and Part 2 of the campaign. For more information about the promotion, please visit our blog. Note: The eligibility of participants will be verified by Crypto.com after the campaign ends.', 'WillekNG1671508604.jpg', 'genius', 34, 1, NULL, NULL, NULL, '2022-03-16 04:01:58'),
(32, 7, 'The First Margin Trading Race of 2022 Has Landed!', 'the-first-margin-trading-race-of-2022-has', 'The Crypto.com Exchange’s first Margin Trading Race of 2022 is locked, loaded, and ready to go! If you haven’t Margin traded in a while, it’s time to shake off the dust. Here’s why: the first 500 users who Margin trade at least USD 100 of any pair will score USD 50 in CRO and the chance to win tickets to a PSG vs Real Madrid Champions League game. New and existing users with a Margin Trading account who have not made a Margin trade since 1 November 2021 are eligible for this campaign. Campaign Period: 14 January 2022 at 08:00 UTC - 26 January 2022 at 00:00 UTC How to participate: Sign in or sign up to the Crypto.com Exchange Open a Margin Wallet (if you are new to Margin Trading) Margin trade at least USD 100 of any pair (FAQ, How-to video) Register for the campaign here. The first 500 eligible users who Margin trade at least USD 100 during the Campaign Period will win a share of USD 25,000 in CRO. Among the winners, three lucky traders will each receive one pair of tickets to the PSG vs Real Madrid Champions League game on 15 February 2022 at Paris Saint-Germain’s homeground, Le Parc des Princes! &lt;&gt; What is Margin Trading? Margin Trading allows users to amplify their trading profits through borrowed funds during both up and down market movements. Users can access up to 3x leverage for eligible pairs. The Crypto.com Coin (CRO) powers Margin Trading with additional utility, offering preferential interest rates—as low as 0.008% per day—to users who stake CRO. Check out our step-by-step video guides on How to Set Up Your Margin Trading Account and Use your Margin Trading Account.\r\n\r\nOfficia doloribus hic aperiam culpa nisi, voluptatem voluptatibus!\r\nUseful Links: Join us on Telegram to connect with our community. Refer to this FAQ for the latest list of supported margin trading pairs. Refer to this Margin Trading FAQ for more details about borrowing limits, and interest rates. Notes: In addition to the following rules, please refer to the Official Rules for Sweepstakes for further rules regarding eligibility. The Margin Trading Campaign is offered by Crypto.com to Crypto.com Exchange users. Any trades that are executed through bad trading practices in Crypto.com’s absolute opinion, including but not limited to wash trades, false trading, self-dealing, or trades that display any attributes of market manipulation (“Disqualified Trades”) will not be counted towards the transaction volume of the participant. The links provided above to helpful information are for reference only. The Reward will be paid in CRO and will be credited into the winners’ Crypto.com Exchange CRO Wallet within 30 days after the Reward Period ends. The Paris Saint-Germain tickets will be e-mailed to the winners’ Crypto.com E-mail address 3-5 days prior to the game. Winners may be required to prove eligibility including proof of age, residence, and identity, which may include submitting a copy of his/her passport or similar government issued identification to collect the e-tickets. Crypto.com is not responsible for paying any additional fees associated with the redemption or usage of the prizes e.g including but not limited to personal expenses, taxes, etc. Margin trading geo-restrictions apply, please refer to this list for the excluded jurisdictions. The eligibility of participants will be verified by Crypto.com after the campaign ends and the lucky draw results will be published. Crypto.com reserves the right to cancel or amend the campaign rules at our sole discretion. All personal data collected is used strictly for verification purposes only. By accepting the prize, winners agree to the Privacy Notice of Crypto.com, which is published at crypto.com/en/privacy/global.html.', 'TKNZEA5U1695631555.jpg', 'winners agree to the Privacy Notice of Crypto.com', 4, 1, NULL, NULL, 'verification,Crypto', '2022-03-16 03:58:54'),
(33, 6, 'CRYPTO.COM APP LISTS IDEX (IDEX)', 'cryptocom-app-lists-idex-idex', 'IDEX (IDEX) is now listed in the Crypto.com App, joining the growing list of 250+ supported cryptocurrencies and stablecoins, including Bitcoin (BTC), Ether (ETH), Polkadot (DOT), Chainlink (LINK), VeChain (VET), USD Coin (USDC), and Crypto.org Coin (CRO). IDEX is the first Hybrid Liquidity DEX that blends the best of centralised and decentralised exchanges, with the performance and features of a traditional order book and the security and liquidity of an automated market maker (AMM). Users benefit from not having to pay additional network costs for placing or canceling orders. Placements are also processed in real time, enabling advanced trading. IDEX is an Ethereum token that powers the IDEX decentralised exchange. IDEX holders can stake tokens in order to help secure the protocol and earn rewards. Crypto.com App users can now purchase IDEX at true cost with USD, EUR, GBP, and 20+ fiat currencies, and spend it at over 80 million merchants globally using the Crypto.com Visa Card.\r\n\r\nOfficia doloribus hic aperiam culpa nisi, voluptatem voluptatibus!\r\n\r\nIDEX is the first Hybrid Liquidity DEX that blends the best of centralised and decentralised exchanges, with the performance and features of a traditional order book and the security and liquidity of an automated market maker (AMM). Users benefit from not having to pay additional network costs for placing or canceling orders. Placements are also processed in real time, enabling advanced trading', 'hhO5rhB71695631480.jpg', 'www.geniusocean.com', 58, 1, 'Ethereum', NULL, 'DEX,exchanges,Ethereum', '2019-01-03 06:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`) VALUES
(2, 'Support', 'support'),
(3, 'Tickets', 'tickets'),
(4, 'Transactions', 'transactions'),
(5, 'Withdraw', 'withdraw'),
(6, 'Deposit', 'deposit'),
(7, 'Wallet', 'wallet');

-- --------------------------------------------------------

--
-- Table structure for table `buy_rents`
--

CREATE TABLE `buy_rents` (
  `id` int(11) NOT NULL,
  `transaction_no` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(255) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `guarantee_amount` double DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `next_rent_time` timestamp NULL DEFAULT NULL,
  `rent_duration` varchar(100) DEFAULT NULL,
  `rent_type` varchar(100) DEFAULT NULL,
  `contract_paper` varchar(255) DEFAULT NULL,
  `required_information` text DEFAULT NULL,
  `phase` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == pending\r\n1 == final_approve\r\n2 == first_approve\r\n3 == second_approve\r\n4 == reject',
  `schedule_time` varchar(100) DEFAULT NULL,
  `visit_date` timestamp NULL DEFAULT NULL,
  `view` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buy_rents`
--

INSERT INTO `buy_rents` (`id`, `transaction_no`, `user_id`, `property_owner_id`, `owner_type`, `property_id`, `amount`, `guarantee_amount`, `type`, `next_rent_time`, `rent_duration`, `rent_type`, `contract_paper`, `required_information`, `phase`, `status`, `schedule_time`, `visit_date`, `view`, `created_at`, `updated_at`) VALUES
(8, 'lMNytK6HMSfL', 104, 86, 'user', 12, 600, 1800, 'for_rent', '2023-01-26 07:34:20', 'monthly', 'immediately', 'mCvyvzV41672126920.pdf', '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"sdfsdfs\",\"text\"],\"nid_front_side\":[\"Rvn22pFz1672126460.jpg\",\"file\"],\"nid_back_side\":[\"vQ7AhiBx1672126460.jpg\",\"file\"]}', '0', 1, NULL, NULL, 1, '2022-12-27 07:34:20', '2023-01-29 08:58:58'),
(9, 'Au8J7MsKWqPu', 104, 86, 'user', 13, 2850, NULL, 'for_buy', NULL, NULL, NULL, NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"sdgdfgdf\",\"text\"],\"nid_front_side\":[\"zXChLitj1672131875.jpg\",\"file\"],\"nid_back_side\":[\"XKvxOG5p1672131875.jpg\",\"file\"]}', '0', 1, NULL, NULL, 1, '2022-12-27 09:04:35', '2023-01-29 09:04:57'),
(10, 'TZeESWl2wMOQ', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-01-26 11:24:01', 'monthly', 'immediately', 'yhwoKPSR1672140468.pdf', '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"dfgdfg\",\"text\"],\"nid_front_side\":[\"9M8pKlYs1672140241.jpg\",\"file\"],\"nid_back_side\":[\"CYMOQ0fk1672140241.jpg\",\"file\"]}', '0', 1, NULL, NULL, 1, '2022-12-27 11:24:01', '2023-01-29 08:58:58'),
(12, 'tBXBrvcTpPMv', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-01-26 11:51:15', 'monthly', 'immediately', '8JsJ5sxU1672141919.pdf', '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"sdfdsf\",\"text\"],\"nid_front_side\":[\"NaSO29hV1672141875.jpg\",\"file\"],\"nid_back_side\":[\"noewX17E1672141875.jpg\",\"file\"]}', '5', 3, NULL, NULL, 1, '2022-12-27 11:51:15', '2023-01-29 08:58:58'),
(13, 'lIV2JJzcnHrh', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-01-31 05:13:13', 'monthly', 'immediately', NULL, '{\"full_name\":[null,\"text\"],\"financial_statement\":[null,\"text\"]}', '2', 0, NULL, NULL, 1, '2023-01-01 05:13:13', '2023-01-29 08:58:58'),
(14, 'YSEZUBGzOG64', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-01-31 05:13:13', 'monthly', 'immediately', NULL, '{\"full_name\":[null,\"text\"],\"financial_statement\":[null,\"text\"]}', '2', 0, NULL, NULL, 1, '2023-01-01 05:13:13', '2023-01-29 08:58:58'),
(15, 'Jyp4jKfvQQmh', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-01-31 06:23:18', 'monthly', 'visit', NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"dgdfgd\",\"text\"],\"nid_front_side\":[\"N8CjHf7A1672554198.jpg\",\"file\"],\"nid_back_side\":[\"LwslZJSc1672554198.jpg\",\"file\"]}', '2', 0, '8 am', '2023-03-01 04:21:04', 1, '2023-01-01 06:23:18', '2023-01-29 08:58:58'),
(16, 'pmgxYBJpyNfg', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-02-24 06:43:38', 'monthly', 'visit', NULL, '{\"full_name\":[null,\"text\"],\"financial_statement\":[null,\"text\"]}', '2', 0, NULL, NULL, 1, '2023-01-25 06:43:38', '2023-01-29 08:58:58'),
(17, 'KrsHK66bOjxt', 102, 86, 'user', 10, 800, 2400, 'for_rent', '2023-02-24 08:43:42', 'monthly', 'visit', NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"ertretr\",\"text\"],\"nid_front_side\":[\"GLZAc7tk1674636222.jpg\",\"file\"],\"nid_back_side\":[\"x1FRaL2o1674636223.png\",\"file\"]}', '2', 0, '9 am', '2023-03-01 04:21:04', 1, '2023-01-25 08:43:43', '2023-01-29 08:58:58'),
(18, 'ZREZle6LhMo0', 102, 86, 'user', 10, 800, 2400, 'for_rent', '2023-02-28 08:09:31', 'monthly', 'visit', NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"financial statement\",\"text\"],\"nid_front_side\":[\"KTw1A7811674979771.jpg\",\"file\"],\"nid_back_side\":[\"al7u3lKZ1674979771.jpg\",\"file\"]}', '2', 0, '8am', '2023-03-01 04:21:04', 1, '2023-01-29 08:09:31', '2023-01-29 08:58:58'),
(19, 'MvlBnI8ijgpx', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-02-28 09:17:09', 'monthly', 'immediately', '5cEUKgCS1674986989.pdf', '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"financial statement\",\"text\"],\"nid_front_side\":[\"urVtKTjG1674983829.jpg\",\"file\"],\"nid_back_side\":[\"IARm1C8i1674983829.jpg\",\"file\"]}', '0', 1, NULL, NULL, 1, '2023-01-29 09:17:09', '2023-01-30 04:18:03'),
(22, 'lGxhElKpW75z', 102, 86, 'user', 12, 600, 1800, 'for_rent', '2023-03-01 05:48:05', 'monthly', 'visit', NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"dsmldmdgflgfde\",\"text\"],\"nid_front_side\":[\"G7UNhEkR1675057685.jpg\",\"file\"],\"nid_back_side\":[\"pAbDagCF1675057685.jpg\",\"file\"]}', '4', 1, '10am', '2023-01-30 05:48:05', 1, '2023-01-30 05:48:05', '2023-01-30 06:03:00'),
(23, 'pE4GmCpNEPRh', 102, 86, 'user', 13, 2850, NULL, 'for_buy', NULL, NULL, NULL, NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"dfdsgdfg\",\"text\"],\"nid_front_side\":[\"clvROOpE1675060692.png\",\"file\"],\"nid_back_side\":[\"VLkUOnAR1675060692.png\",\"file\"]}', '4', 3, NULL, NULL, 1, '2023-01-30 06:38:12', '2023-01-30 08:13:05'),
(24, 'ZfmT35rpyjVE', 102, 86, 'user', 13, 2850, NULL, 'for_buy', NULL, NULL, NULL, '9g3bDqI41675071284.pdf', '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"dfgdfgdf\",\"text\"],\"nid_front_side\":[\"w8grj59e1675067813.png\",\"file\"],\"nid_back_side\":[\"GcHWifEJ1675067813.jpg\",\"file\"]}', '0', 1, NULL, NULL, 1, '2023-01-30 08:36:53', '2023-01-30 09:36:42'),
(25, 'Pn7cjMRdBXQ3', 104, 86, NULL, 12, 600, 1800, 'for_rent', '2023-04-11 23:47:26', 'monthly', 'immediately', NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"ghjghj\",\"text\"],\"nid_front_side\":[\"AhQR6qdb1678686446.png\",\"file\"],\"nid_back_side\":[\"KhWisEJT1678686446.png\",\"file\"]}', '2', 0, NULL, NULL, 1, '2023-03-12 23:47:26', '2023-03-20 06:23:55'),
(26, 'q1K2Kj4IT77M', 104, 86, NULL, 8, 9200, NULL, 'for_buy', NULL, NULL, NULL, NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"safdsfs\",\"text\"],\"nid_front_side\":[\"zvPMSiwz1679292358.png\",\"file\"],\"nid_back_side\":[\"i9jmM8QW1679292358.png\",\"file\"]}', '3', 2, NULL, NULL, 1, '2023-03-20 06:05:58', '2023-03-20 06:24:11'),
(27, 'f69dDVrG8WOb', 106, 86, NULL, 12, 600, 1800, 'for_rent', '2023-08-15 06:35:13', 'monthly', 'visit', NULL, '{\"full_name\":[\"ahmed afzal\",\"text\"],\"financial_statement\":[\"financial statement\",\"text\"],\"nid_front_side\":[\"PL3tig1d1689489313.jpg\",\"file\"],\"nid_back_side\":[\"NLYDtrIf1689489313.jpg\",\"file\"]}', '4', 4, '9am', '2023-07-16 06:35:13', 1, '2023-07-16 06:35:13', '2023-09-07 00:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(23, 'Apartment', 'apartment', 1, NULL, '2022-11-22 08:08:51', '2022-11-22 08:08:51'),
(24, 'Family House', 'family-house', 1, NULL, '2022-11-22 08:09:13', '2022-11-22 08:09:13'),
(25, 'Modern Villa', 'modern-villa', 1, NULL, '2022-11-22 08:09:25', '2022-11-22 08:09:25'),
(26, 'Town House', 'town-house', 1, NULL, '2022-11-22 08:09:39', '2022-11-22 08:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 19, 'Dhaka', 1, '2022-09-22 04:30:00', '2022-09-22 04:30:00'),
(2, 105, 'New Delhi', 1, '2022-09-22 04:32:56', '2022-09-22 04:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `iso2` varchar(191) NOT NULL,
  `iso3` varchar(191) NOT NULL,
  `phone_code` int(11) NOT NULL,
  `postcode_required` tinyint(4) NOT NULL DEFAULT 0,
  `is_eu` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso2`, `iso3`, `phone_code`, `postcode_required`, `is_eu`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', 'AD', 'AND', 376, 0, 0, 0, NULL, NULL),
(2, 'United Arab Emirates', 'AE', 'ARE', 971, 0, 0, 0, NULL, NULL),
(3, 'Afghanistan', 'AF', 'AFG', 93, 0, 0, 0, NULL, NULL),
(4, 'Antigua and Barbuda', 'AG', 'ATG', 1268, 0, 0, 0, NULL, NULL),
(5, 'Anguilla', 'AI', 'AIA', 1264, 0, 0, 0, NULL, NULL),
(6, 'Albania', 'AL', 'ALB', 355, 0, 0, 0, NULL, NULL),
(7, 'Armenia', 'AM', 'ARM', 374, 0, 0, 0, NULL, NULL),
(8, 'Angola', 'AO', 'AGO', 244, 0, 0, 0, NULL, NULL),
(9, 'Antarctica', 'AQ', 'ATA', 672, 0, 0, 0, NULL, NULL),
(10, 'Argentina', 'AR', 'ARG', 54, 0, 0, 0, NULL, NULL),
(11, 'American Samoa', 'AS', 'ASM', 1684, 0, 0, 0, NULL, NULL),
(12, 'Austria', 'AT', 'AUT', 43, 0, 0, 0, NULL, NULL),
(13, 'Australia', 'AU', 'AUS', 61, 0, 0, 0, NULL, NULL),
(14, 'Aruba', 'AW', 'ABW', 297, 0, 0, 0, NULL, NULL),
(15, 'Åland Islands', 'AX', 'ALA', 0, 0, 0, 0, NULL, NULL),
(16, 'Azerbaijan', 'AZ', 'AZE', 994, 0, 0, 0, NULL, NULL),
(17, 'Bosnia and Herzegovina', 'BA', 'BIH', 387, 0, 0, 0, NULL, NULL),
(18, 'Barbados', 'BB', 'BRB', 1246, 0, 0, 0, NULL, NULL),
(19, 'Bangladesh', 'BD', 'BGD', 880, 0, 0, 1, NULL, '2022-06-01 10:25:09'),
(20, 'Belgium', 'BE', 'BEL', 32, 0, 0, 0, NULL, NULL),
(21, 'Burkina Faso', 'BF', 'BFA', 226, 0, 0, 0, NULL, NULL),
(22, 'Bulgaria', 'BG', 'BGR', 359, 0, 0, 0, NULL, NULL),
(23, 'Bahrain', 'BH', 'BHR', 973, 0, 0, 0, NULL, NULL),
(24, 'Burundi', 'BI', 'BDI', 257, 0, 0, 0, NULL, NULL),
(25, 'Benin', 'BJ', 'BEN', 229, 0, 0, 0, NULL, NULL),
(26, 'Saint Barthélemy', 'BL', 'BLM', 0, 0, 0, 0, NULL, NULL),
(27, 'Bermuda', 'BM', 'BMU', 1441, 0, 0, 0, NULL, NULL),
(28, 'Brunei Darussalam', 'BN', 'BRN', 673, 0, 0, 0, NULL, NULL),
(29, 'Bolivia', 'BO', 'BOL', 591, 0, 0, 0, NULL, NULL),
(30, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', 0, 0, 0, 0, NULL, NULL),
(31, 'Brazil', 'BR', 'BRA', 55, 0, 0, 0, NULL, NULL),
(32, 'Bahamas', 'BS', 'BHS', 1242, 0, 0, 0, NULL, NULL),
(33, 'Bhutan', 'BT', 'BTN', 975, 0, 0, 1, NULL, '2022-09-22 04:04:53'),
(34, 'Bouvet Island', 'BV', 'BVT', 44, 0, 0, 0, NULL, NULL),
(35, 'Botswana', 'BW', 'BWA', 267, 0, 0, 0, NULL, NULL),
(36, 'Belarus', 'BY', 'BLR', 375, 0, 0, 0, NULL, NULL),
(37, 'Belize', 'BZ', 'BLZ', 501, 0, 0, 0, NULL, NULL),
(38, 'Canada', 'CA', 'CAN', 1, 0, 0, 0, NULL, NULL),
(39, 'Cocos (Keeling) Islands', 'CC', 'CCK', 61, 0, 0, 0, NULL, NULL),
(40, 'Congo (Democratic Republic of the)', 'CD', 'COD', 243, 0, 0, 0, NULL, NULL),
(41, 'Central African Republic', 'CF', 'CAF', 236, 0, 0, 0, NULL, NULL),
(42, 'Congo', 'CG', 'COG', 242, 0, 0, 0, NULL, NULL),
(43, 'Switzerland', 'CH', 'CHE', 41, 0, 0, 0, NULL, NULL),
(44, 'Ivory Coast', 'CI', 'CIV', 225, 0, 0, 0, NULL, NULL),
(45, 'Cook Islands', 'CK', 'COK', 682, 0, 0, 0, NULL, NULL),
(46, 'Chile', 'CL', 'CHL', 56, 0, 0, 0, NULL, NULL),
(47, 'Cameroon', 'CM', 'CMR', 237, 0, 0, 0, NULL, NULL),
(48, 'China', 'CN', 'CHN', 86, 0, 0, 0, NULL, NULL),
(49, 'Colombia', 'CO', 'COL', 57, 0, 0, 0, NULL, NULL),
(50, 'Costa Rica', 'CR', 'CRI', 506, 0, 0, 0, NULL, NULL),
(51, 'Cuba', 'CU', 'CUB', 53, 0, 0, 0, NULL, NULL),
(52, 'Cape Verde', 'CV', 'CPV', 238, 0, 0, 0, NULL, NULL),
(53, 'Curaçao', 'CW', 'CUW', 0, 0, 0, 0, NULL, NULL),
(54, 'Christmas Island', 'CX', 'CXR', 61, 0, 0, 0, NULL, NULL),
(55, 'Cyprus', 'CY', 'CYP', 357, 0, 0, 0, NULL, NULL),
(56, 'Czech Republic', 'CZ', 'CZE', 420, 0, 0, 0, NULL, NULL),
(57, 'Germany', 'DE', 'DEU', 49, 0, 0, 0, NULL, NULL),
(58, 'Djibouti', 'DJ', 'DJI', 253, 0, 0, 0, NULL, NULL),
(59, 'Denmark', 'DK', 'DNK', 45, 0, 0, 0, NULL, NULL),
(60, 'Dominica', 'DM', 'DMA', 1767, 0, 0, 0, NULL, NULL),
(61, 'Dominican Republic', 'DO', 'DOM', 1809, 0, 0, 0, NULL, NULL),
(62, 'Algeria', 'DZ', 'DZA', 213, 0, 0, 0, NULL, NULL),
(63, 'Ecuador', 'EC', 'ECU', 593, 0, 0, 0, NULL, NULL),
(64, 'Estonia', 'EE', 'EST', 372, 0, 0, 0, NULL, NULL),
(65, 'Egypt', 'EG', 'EGY', 20, 0, 0, 0, NULL, NULL),
(66, 'Western Sahara', 'EH', 'ESH', 0, 0, 0, 0, NULL, NULL),
(67, 'Eritrea', 'ER', 'ERI', 291, 0, 0, 0, NULL, NULL),
(68, 'Spain', 'ES', 'ESP', 34, 0, 0, 0, NULL, NULL),
(69, 'Ethiopia', 'ET', 'ETH', 251, 0, 0, 0, NULL, NULL),
(70, 'Finland', 'FI', 'FIN', 358, 0, 0, 0, NULL, NULL),
(71, 'Fiji', 'FJ', 'FJI', 679, 0, 0, 0, NULL, NULL),
(72, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 500, 0, 0, 0, NULL, NULL),
(73, 'Micronesia (Federated States of)', 'FM', 'FSM', 691, 0, 0, 0, NULL, NULL),
(74, 'Faroe Islands', 'FO', 'FRO', 298, 0, 0, 0, NULL, NULL),
(75, 'France', 'FR', 'FRA', 33, 0, 0, 0, NULL, NULL),
(76, 'Gabon', 'GA', 'GAB', 241, 0, 0, 0, NULL, NULL),
(77, 'United Kingdom', 'GB', 'GBR', 44, 1, 0, 0, NULL, NULL),
(78, 'Grenada', 'GD', 'GRD', 1473, 0, 0, 0, NULL, NULL),
(79, 'Georgia', 'GE', 'GEO', 995, 0, 0, 0, NULL, NULL),
(80, 'French Guiana', 'GF', 'GUF', 594, 0, 0, 0, NULL, NULL),
(81, 'Guernsey', 'GG', 'GGY', 0, 0, 0, 0, NULL, NULL),
(82, 'Ghana', 'GH', 'GHA', 233, 0, 0, 0, NULL, NULL),
(83, 'Gibraltar', 'GI', 'GIB', 350, 0, 0, 0, NULL, NULL),
(84, 'Greenland', 'GL', 'GRL', 299, 0, 0, 0, NULL, NULL),
(85, 'Gambia', 'GM', 'GMB', 220, 0, 0, 0, NULL, NULL),
(86, 'Guinea', 'GN', 'GIN', 224, 0, 0, 0, NULL, NULL),
(87, 'Guadeloupe', 'GP', 'GLP', 590, 0, 0, 0, NULL, NULL),
(88, 'Equatorial Guinea', 'GQ', 'GNQ', 240, 0, 0, 0, NULL, NULL),
(89, 'Greece', 'GR', 'GRC', 30, 0, 0, 0, NULL, NULL),
(90, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 44, 0, 0, 0, NULL, NULL),
(91, 'Guatemala', 'GT', 'GTM', 502, 0, 0, 0, NULL, NULL),
(92, 'Guam', 'GU', 'GUM', 1671, 0, 0, 0, NULL, NULL),
(93, 'Guinea-Bissau', 'GW', 'GNB', 245, 0, 0, 0, NULL, NULL),
(94, 'Guyana', 'GY', 'GUY', 592, 0, 0, 0, NULL, NULL),
(95, 'Hong Kong', 'HK', 'HKG', 852, 0, 0, 0, NULL, NULL),
(96, 'Heard Island and McDonald Islands', 'HM', 'HMD', 44, 0, 0, 0, NULL, NULL),
(97, 'Honduras', 'HN', 'HND', 504, 0, 0, 0, NULL, NULL),
(98, 'Croatia (Hrvatska)', 'HR', 'HRV', 385, 0, 0, 0, NULL, NULL),
(99, 'Haiti', 'HT', 'HTI', 509, 0, 0, 0, NULL, NULL),
(100, 'Hungary', 'HU', 'HUN', 36, 0, 0, 0, NULL, NULL),
(101, 'Indonesia', 'ID', 'IDN', 62, 0, 0, 1, NULL, NULL),
(102, 'Ireland', 'IE', 'IRL', 353, 0, 0, 0, NULL, NULL),
(103, 'Israel', 'IL', 'ISR', 972, 0, 0, 0, NULL, NULL),
(104, 'Isle of Man', 'IM', 'IMN', 0, 0, 0, 0, NULL, NULL),
(105, 'India', 'IN', 'IND', 91, 0, 0, 1, NULL, '2022-09-22 04:04:19'),
(106, 'British Indian Ocean Territory', 'IO', 'IOT', 0, 0, 0, 0, NULL, NULL),
(107, 'Iraq', 'IQ', 'IRQ', 964, 0, 0, 0, NULL, NULL),
(108, 'Iran (Islamic Republic of)', 'IR', 'IRN', 98, 0, 0, 0, NULL, NULL),
(109, 'Iceland', 'IS', 'ISL', 354, 0, 0, 0, NULL, NULL),
(110, 'Italy', 'IT', 'ITA', 39, 0, 0, 0, NULL, NULL),
(111, 'Jersey', 'JE', 'JEY', 0, 0, 0, 0, NULL, NULL),
(112, 'Jamaica', 'JM', 'JAM', 1876, 0, 0, 0, NULL, NULL),
(113, 'Jordan', 'JO', 'JOR', 962, 0, 0, 0, NULL, NULL),
(114, 'Japan', 'JP', 'JPN', 81, 0, 0, 0, NULL, NULL),
(115, 'Kenya', 'KE', 'KEN', 254, 0, 0, 0, NULL, NULL),
(116, 'Kyrgyzstan', 'KG', 'KGZ', 996, 0, 0, 0, NULL, NULL),
(117, 'Cambodia', 'KH', 'KHM', 855, 0, 0, 0, NULL, NULL),
(118, 'Kiribati', 'KI', 'KIR', 686, 0, 0, 0, NULL, NULL),
(119, 'Comoros', 'KM', 'COM', 269, 0, 0, 0, NULL, NULL),
(120, 'Saint Kitts and Nevis', 'KN', 'KNA', 1869, 0, 0, 0, NULL, NULL),
(121, 'Korea (Democratic People\'s Republic of)', 'KP', 'PRK', 850, 0, 0, 0, NULL, NULL),
(122, 'Korea (Republic of)', 'KR', 'KOR', 82, 0, 0, 1, NULL, NULL),
(123, 'Kuwait', 'KW', 'KWT', 965, 0, 0, 0, NULL, NULL),
(124, 'Cayman Islands', 'KY', 'CYM', 1345, 0, 0, 0, NULL, NULL),
(125, 'Kazakhstan', 'KZ', 'KAZ', 7, 0, 0, 0, NULL, NULL),
(126, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 856, 0, 0, 0, NULL, NULL),
(127, 'Lebanon', 'LB', 'LBN', 961, 0, 0, 0, NULL, NULL),
(128, 'Saint Lucia', 'LC', 'LCA', 1758, 0, 0, 0, NULL, NULL),
(129, 'Liechtenstein', 'LI', 'LIE', 423, 0, 0, 0, NULL, NULL),
(130, 'Sri Lanka', 'LK', 'LKA', 94, 0, 0, 0, NULL, NULL),
(131, 'Liberia', 'LR', 'LBR', 231, 0, 0, 0, NULL, NULL),
(132, 'Lesotho', 'LS', 'LSO', 266, 0, 0, 0, NULL, NULL),
(133, 'Lithuania', 'LT', 'LTU', 370, 0, 0, 0, NULL, NULL),
(134, 'Luxembourg', 'LU', 'LUX', 352, 0, 0, 0, NULL, NULL),
(135, 'Latvia', 'LV', 'LVA', 371, 0, 0, 0, NULL, NULL),
(136, 'Libya', 'LY', 'LBY', 218, 0, 0, 0, NULL, NULL),
(137, 'Morocco', 'MA', 'MAR', 212, 0, 0, 0, NULL, NULL),
(138, 'Monaco', 'MC', 'MCO', 377, 0, 0, 0, NULL, NULL),
(139, 'Moldova (Republic of)', 'MD', 'MDA', 373, 0, 0, 0, NULL, NULL),
(140, 'Montenegro', 'ME', 'MNE', 382, 0, 0, 0, NULL, NULL),
(141, 'Saint Martin (French part)', 'MF', 'MAF', 0, 0, 0, 0, NULL, NULL),
(142, 'Madagascar', 'MG', 'MDG', 261, 0, 0, 0, NULL, NULL),
(143, 'Marshall Islands', 'MH', 'MHL', 692, 0, 0, 0, NULL, NULL),
(144, 'Macedonia', 'MK', 'MKD', 389, 0, 0, 0, NULL, NULL),
(145, 'Mali', 'ML', 'MLI', 223, 0, 0, 0, NULL, NULL),
(146, 'Myanmar', 'MM', 'MMR', 95, 0, 0, 0, NULL, NULL),
(147, 'Mongolia', 'MN', 'MNG', 976, 0, 0, 0, NULL, NULL),
(148, 'Macau', 'MO', 'MAC', 853, 0, 0, 0, NULL, NULL),
(149, 'Northern Mariana Islands', 'MP', 'MNP', 1670, 0, 0, 0, NULL, NULL),
(150, 'Martinique', 'MQ', 'MTQ', 596, 0, 0, 0, NULL, NULL),
(151, 'Mauritania', 'MR', 'MRT', 222, 0, 0, 0, NULL, NULL),
(152, 'Montserrat', 'MS', 'MSR', 1664, 0, 0, 0, NULL, NULL),
(153, 'Malta', 'MT', 'MLT', 356, 0, 0, 0, NULL, NULL),
(154, 'Mauritius', 'MU', 'MUS', 230, 0, 0, 0, NULL, NULL),
(155, 'Maldives', 'MV', 'MDV', 960, 0, 0, 0, NULL, NULL),
(156, 'Malawi', 'MW', 'MWI', 265, 0, 0, 0, NULL, NULL),
(157, 'Mexico', 'MX', 'MEX', 52, 0, 0, 0, NULL, NULL),
(158, 'Malaysia', 'MY', 'MYS', 60, 0, 0, 1, NULL, '2022-09-22 04:05:14'),
(159, 'Mozambique', 'MZ', 'MOZ', 258, 0, 0, 0, NULL, NULL),
(160, 'Namibia', 'NA', 'NAM', 264, 0, 0, 0, NULL, NULL),
(161, 'New Caledonia', 'NC', 'NCL', 687, 0, 0, 0, NULL, NULL),
(162, 'Niger', 'NE', 'NER', 227, 0, 0, 0, NULL, NULL),
(163, 'Norfolk Island', 'NF', 'NFK', 672, 0, 0, 0, NULL, NULL),
(164, 'Nigeria', 'NG', 'NGA', 234, 0, 0, 1, NULL, NULL),
(165, 'Nicaragua', 'NI', 'NIC', 505, 0, 0, 0, NULL, NULL),
(166, 'Netherlands', 'NL', 'NLD', 31, 0, 0, 0, NULL, NULL),
(167, 'Norway', 'NO', 'NOR', 47, 0, 0, 0, NULL, NULL),
(168, 'Nepal', 'NP', 'NPL', 977, 0, 0, 1, NULL, '2022-09-22 04:04:35'),
(169, 'Nauru', 'NR', 'NRU', 674, 0, 0, 0, NULL, NULL),
(170, 'Niue', 'NU', 'NIU', 683, 0, 0, 0, NULL, NULL),
(171, 'New Zealand', 'NZ', 'NZL', 64, 0, 0, 0, NULL, NULL),
(172, 'Oman', 'OM', 'OMN', 968, 0, 0, 0, NULL, NULL),
(173, 'Panama', 'PA', 'PAN', 507, 0, 0, 0, NULL, NULL),
(174, 'Peru', 'PE', 'PER', 51, 0, 0, 0, NULL, NULL),
(175, 'French Polynesia', 'PF', 'PYF', 689, 0, 0, 0, NULL, NULL),
(176, 'Papua New Guinea', 'PG', 'PNG', 675, 0, 0, 0, NULL, NULL),
(177, 'Philippines', 'PH', 'PHL', 63, 0, 0, 0, NULL, NULL),
(178, 'Pakistan', 'PK', 'PAK', 92, 0, 0, 1, NULL, '2022-09-22 04:04:27'),
(179, 'Poland', 'PL', 'POL', 48, 0, 0, 0, NULL, NULL),
(180, 'Saint Pierre and Miquelon', 'PM', 'SPM', 508, 0, 0, 0, NULL, NULL),
(181, 'Pitcairn', 'PN', 'PCN', 870, 0, 0, 0, NULL, NULL),
(182, 'Puerto Rico', 'PR', 'PRI', 1, 0, 0, 0, NULL, NULL),
(183, 'Palestine, State of', 'PS', 'PSE', 0, 0, 0, 0, NULL, NULL),
(184, 'Portugal', 'PT', 'PRT', 351, 0, 0, 1, NULL, '2022-09-22 04:05:22'),
(185, 'Palau', 'PW', 'PLW', 680, 0, 0, 0, NULL, NULL),
(186, 'Paraguay', 'PY', 'PRY', 595, 0, 0, 0, NULL, NULL),
(187, 'Qatar', 'QA', 'QAT', 974, 0, 0, 0, NULL, NULL),
(188, 'Reunion', 'RE', 'REU', 262, 0, 0, 0, NULL, NULL),
(189, 'Romania', 'RO', 'ROU', 40, 0, 0, 0, NULL, NULL),
(190, 'Serbia', 'RS', 'SRB', 381, 0, 0, 0, NULL, NULL),
(191, 'Russian Federation', 'RU', 'RUS', 7, 0, 0, 0, NULL, NULL),
(192, 'Rwanda', 'RW', 'RWA', 250, 0, 0, 0, NULL, NULL),
(193, 'Saudi Arabia', 'SA', 'SAU', 966, 0, 0, 0, NULL, NULL),
(194, 'Solomon Islands', 'SB', 'SLB', 677, 0, 0, 0, NULL, NULL),
(195, 'Seychelles', 'SC', 'SYC', 248, 0, 0, 0, NULL, NULL),
(196, 'Sudan', 'SD', 'SDN', 249, 0, 0, 0, NULL, NULL),
(197, 'Sweden', 'SE', 'SWE', 46, 0, 0, 0, NULL, NULL),
(198, 'Singapore', 'SG', 'SGP', 65, 0, 0, 1, NULL, '2022-09-22 04:05:29'),
(199, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 290, 0, 0, 0, NULL, NULL),
(200, 'Slovenia', 'SI', 'SVN', 386, 0, 0, 0, NULL, NULL),
(201, 'Svalbard and Jan Mayen', 'SJ', 'SJM', 0, 0, 0, 0, NULL, NULL),
(202, 'Slovakia', 'SK', 'SVK', 421, 0, 0, 0, NULL, NULL),
(203, 'Sierra Leone', 'SL', 'SLE', 232, 0, 0, 0, NULL, NULL),
(204, 'San Marino', 'SM', 'SMR', 378, 0, 0, 0, NULL, NULL),
(205, 'Senegal', 'SN', 'SEN', 221, 0, 0, 0, NULL, NULL),
(206, 'Somalia', 'SO', 'SOM', 252, 0, 0, 0, NULL, NULL),
(207, 'Suriname', 'SR', 'SUR', 597, 0, 0, 0, NULL, NULL),
(208, 'South Sudan', 'SS', 'SSD', 0, 0, 0, 0, NULL, NULL),
(209, 'Sao Tome and Principe', 'ST', 'STP', 239, 0, 0, 0, NULL, NULL),
(210, 'El Salvador', 'SV', 'SLV', 503, 0, 0, 0, NULL, NULL),
(211, 'Sint Maarten (Dutch part)', 'SX', 'SXM', 0, 0, 0, 0, NULL, NULL),
(212, 'Syrian Arab Republic', 'SY', 'SYR', 963, 0, 0, 0, NULL, NULL),
(213, 'Swaziland', 'SZ', 'SWZ', 268, 0, 0, 0, NULL, NULL),
(214, 'Turks and Caicos Islands', 'TC', 'TCA', 1649, 0, 0, 0, NULL, NULL),
(215, 'Chad', 'TD', 'TCD', 235, 0, 0, 0, NULL, NULL),
(216, 'French Southern Territories', 'TF', 'ATF', 44, 0, 0, 0, NULL, NULL),
(217, 'Togo', 'TG', 'TGO', 228, 0, 0, 0, NULL, NULL),
(218, 'Thailand', 'TH', 'THA', 66, 0, 0, 0, NULL, NULL),
(219, 'Tajikistan', 'TJ', 'TJK', 992, 0, 0, 0, NULL, NULL),
(220, 'Tokelau', 'TK', 'TKL', 690, 0, 0, 0, NULL, NULL),
(221, 'Timor-Leste', 'TL', 'TLS', 670, 0, 0, 0, NULL, NULL),
(222, 'Turkmenistan', 'TM', 'TKM', 993, 0, 0, 0, NULL, NULL),
(223, 'Tunisia', 'TN', 'TUN', 216, 0, 0, 0, NULL, NULL),
(224, 'Tonga', 'TO', 'TON', 676, 0, 0, 0, NULL, NULL),
(225, 'Turkey', 'TR', 'TUR', 90, 0, 0, 0, NULL, NULL),
(226, 'Trinidad and Tobago', 'TT', 'TTO', 1868, 0, 0, 0, NULL, NULL),
(227, 'Tuvalu', 'TV', 'TUV', 688, 0, 0, 0, NULL, NULL),
(228, 'Taiwan', 'TW', 'TWN', 886, 0, 0, 1, NULL, '2022-06-29 22:06:59'),
(229, 'Tanzania, United Republic of', 'TZ', 'TZA', 255, 0, 0, 0, NULL, NULL),
(230, 'Ukraine', 'UA', 'UKR', 380, 0, 0, 0, NULL, NULL),
(231, 'Uganda', 'UG', 'UGA', 256, 0, 0, 0, NULL, NULL),
(232, 'United States Minor Outlying Islands', 'UM', 'UMI', 44, 0, 0, 0, NULL, NULL),
(233, 'United States of America', 'US', 'USA', 1, 0, 0, 0, NULL, NULL),
(234, 'Uruguay', 'UY', 'URY', 598, 0, 0, 0, NULL, NULL),
(235, 'Uzbekistan', 'UZ', 'UZB', 998, 0, 0, 0, NULL, NULL),
(236, 'Vatican City State', 'VA', 'VAT', 39, 0, 0, 0, NULL, NULL),
(237, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1784, 0, 0, 0, NULL, NULL),
(238, 'Venezuela', 'VE', 'VEN', 58, 0, 0, 0, NULL, NULL),
(239, 'Virgin Islands (British)', 'VG', 'VGB', 1284, 0, 0, 0, NULL, NULL),
(240, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1340, 0, 0, 0, NULL, NULL),
(241, 'Viet Nam', 'VN', 'VNM', 84, 0, 0, 0, NULL, NULL),
(242, 'Vanuatu', 'VU', 'VUT', 678, 0, 0, 0, NULL, NULL),
(243, 'Wallis and Futuna', 'WF', 'WLF', 681, 0, 0, 0, NULL, NULL),
(244, 'Samoa', 'WS', 'WSM', 685, 0, 0, 0, NULL, NULL),
(245, 'Yemen', 'YE', 'YEM', 967, 0, 0, 1, NULL, '2022-06-29 22:07:02'),
(246, 'Mayotte', 'YT', 'MYT', 262, 0, 0, 0, NULL, NULL),
(247, 'South Africa', 'ZA', 'ZAF', 27, 0, 0, 0, NULL, NULL),
(248, 'Zambia', 'ZM', 'ZMB', 260, 0, 0, 0, NULL, '2022-06-29 22:06:19'),
(249, 'Zimbabwe', 'ZW', 'ZWE', 263, 0, 0, 0, NULL, '2022-06-01 10:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sign`, `value`, `is_default`) VALUES
(1, 'USD', '$', 1, 1),
(4, 'BDT', '৳', 82.92649841308594, 0),
(6, 'EUR', '€', 0.864870011806488, 0),
(8, 'NGN', '₦', 410.94, 0),
(9, 'INR', '₹', 74, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `deposit_number` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `coin_amount` double DEFAULT NULL,
  `notify_id` varchar(255) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `charge_id` varchar(255) DEFAULT NULL,
  `status` enum('pending','complete','reject') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `deposit_number`, `user_id`, `amount`, `coin_amount`, `notify_id`, `currency_id`, `txnid`, `method`, `charge_id`, `status`, `created_at`, `updated_at`) VALUES
(187, 'KLfjIOwfFgyT', 102, 10, NULL, NULL, 1, 'txn_3MU5SdJlIV5dN9n70x0TIfBJ', 'stripe', 'ch_3MU5SdJlIV5dN9n70FH8EOER', 'complete', '2023-01-25 09:40:07', '2023-01-25 09:40:07'),
(188, 'tR722hMDmbRZ', 102, 10, NULL, NULL, 1, '123456789', 'Manual', NULL, 'pending', '2023-01-25 09:43:51', '2023-01-25 09:43:51'),
(189, 'jx6EyT51jIZL', 102, 10, NULL, NULL, 1, NULL, 'authorize.net', NULL, 'complete', '2023-01-25 09:45:03', '2023-01-25 09:45:03'),
(190, 'qbKck2JFmORO', 102, 10, NULL, NULL, 1, NULL, 'authorize.net', NULL, 'complete', '2023-01-25 09:57:01', '2023-01-25 09:57:01'),
(191, 'o80CAoqUi4dR', 102, 10, NULL, NULL, 1, '7K672732G0960350K', 'paypal', NULL, 'complete', '2023-01-25 09:57:34', '2023-01-25 09:58:11'),
(192, 'pUePdCl5MrJH', 86, 10, NULL, NULL, 1, 'txn_3MWYBjJlIV5dN9n70LqWZ6qj', 'stripe', 'ch_3MWYBjJlIV5dN9n702yo0wVJ', 'complete', '2023-02-01 04:44:51', '2023-02-01 04:44:51'),
(193, 'UMQpH8nWFxMP', 86, 10, NULL, NULL, 1, '123456789', 'Manual', NULL, 'reject', '2023-03-13 02:20:47', '2023-03-13 02:36:11'),
(194, '0MFBV5BF8KDK', 86, 0.13513513513514, NULL, NULL, NULL, 'order_LQwmkrgREBgIV8', 'razorpay', NULL, 'complete', '2023-03-13 02:45:02', '2023-03-13 02:45:02'),
(195, '0MFBV5BF8KDK', 86, 0.13513513513514, NULL, NULL, NULL, 'order_LQwmkrgREBgIV8', 'razorpay', NULL, 'complete', '2023-03-13 02:48:07', '2023-03-13 02:48:07'),
(196, 'sOaPEdN49dLm', 86, 10, NULL, NULL, 1, NULL, 'flutterwave', NULL, 'complete', '2023-03-13 02:54:13', '2023-03-13 02:55:00'),
(197, 'p0PI721ia53M', 86, 10, NULL, NULL, 1, NULL, 'flutterwave', NULL, 'complete', '2023-03-13 02:57:19', '2023-03-13 02:57:47'),
(198, 'F7GMGBHHaqi5', 86, 10, NULL, NULL, 1, NULL, 'authorize.net', NULL, 'complete', '2023-03-13 02:58:17', '2023-03-13 02:58:17'),
(199, 'HUCw5TmPAUsq', 86, 0.13513513513514, NULL, NULL, 9, NULL, 'paytm', NULL, 'pending', '2023-03-13 02:59:42', '2023-03-13 02:59:42'),
(200, '5Xg5wmouodMQ', 86, 0.13513513513514, NULL, NULL, 9, NULL, 'paytm', NULL, 'pending', '2023-03-13 03:01:38', '2023-03-13 03:01:38'),
(201, 'DunlAqDl0KTH', 86, 1000, NULL, NULL, 1, 'txn_3NnJKaJlIV5dN9n70U4YMKqk', 'stripe', 'ch_3NnJKaJlIV5dN9n70YGLS0uT', 'complete', '2023-09-06 23:51:33', '2023-09-06 23:51:33'),
(202, 'GRmPgNdrze86', 86, 10, NULL, NULL, 1, 'txn_3Nu8MwJlIV5dN9n71FKjVdz2', 'stripe', 'ch_3Nu8MwJlIV5dN9n71pNM25PQ', 'complete', '2023-09-25 06:34:11', '2023-09-25 06:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_forms`
--

CREATE TABLE `dynamic_forms` (
  `id` int(11) NOT NULL,
  `user_type` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `form_type` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `required` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dynamic_forms`
--

INSERT INTO `dynamic_forms` (`id`, `user_type`, `user_id`, `form_type`, `type`, `label`, `name`, `required`, `created_at`, `updated_at`) VALUES
(9, 1, NULL, 'kyc', 1, 'Full Name', 'full_name', 1, '2022-03-06 06:08:28', '2022-03-06 06:08:28'),
(10, 1, NULL, 'kyc', 2, 'NID', 'nid', 1, '2022-03-06 06:08:38', '2022-03-06 06:08:38'),
(11, 1, NULL, 'kyc', 3, 'Present Address', 'present_address', 1, '2022-03-06 06:08:51', '2022-03-06 06:08:51'),
(12, 1, NULL, 'kyc', 3, 'Parmanent Address', 'parmanent_address', 1, '2022-03-06 06:09:04', '2022-03-06 06:09:04'),
(22, 2, 86, 'buy_sell', 1, 'Full Name', 'full_name', 1, '2022-12-22 10:46:29', '2022-12-22 10:46:29'),
(23, 2, 86, 'buy_sell', 2, 'NID Front Side', 'nid_front_side', 1, '2022-12-22 10:51:27', '2022-12-22 10:51:27'),
(24, 2, 86, 'buy_sell', 2, 'NID Back Side', 'nid_back_side', 1, '2022-12-22 10:52:24', '2022-12-22 10:52:24'),
(25, 2, 86, 'buy_sell', 3, 'Financial Statement', 'financial_statement', 1, '2022-12-22 10:53:11', '2022-12-22 10:53:11'),
(27, 1, 0, 'buy_sell', 1, 'Full Name', 'full_name', 1, '2023-03-14 01:55:08', '2023-03-14 01:55:08'),
(28, 1, 0, 'buy_sell', 2, 'NID Front Side', 'nid_front_side', 1, '2023-03-14 01:55:45', '2023-03-14 01:55:45'),
(29, 1, 0, 'buy_sell', 2, 'NID Back Side', 'nid_back_side', 1, '2023-03-14 01:55:56', '2023-03-14 01:55:56'),
(30, 1, 0, 'buy_sell', 3, 'Addresss', 'addresss', 1, '2023-03-14 01:56:16', '2023-03-14 01:56:27'),
(32, 2, 86, 'buy_sell', 1, 'ID Card', 'id_card', 1, '2023-09-18 17:50:39', '2023-09-18 17:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `email_type` varchar(255) DEFAULT NULL,
  `email_subject` mediumtext DEFAULT NULL,
  `email_body` longtext DEFAULT NULL,
  `sms` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `email_type`, `email_subject`, `email_body`, `sms`, `status`) VALUES
(1, 'welcome', 'Welcome to our website.', '<p>Hello {customer_name},<br>Your registration successfully completed.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>Your registration successfully completed.</p><p>Thank You<br></p>', 1),
(2, 'credited', 'Your Account has been credited', '<p>Hello {customer_name},<br>Your account has been credited by admin.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>Your account has been credited by admin.</p><p>Thank You<br></p>', 1),
(3, 'debited', 'Your Account has been debited', '<p></p><p>Hello {customer_name},<br>Your account has been debited by admin.</p><p><span style=\"font-size: 1rem;\">Thank You</span></p><p></p>', '<p>Hello {customer_name},<br>Your account has been debited by admin.</p><p>Thank You<br></p>', 1),
(4, 'Withdraw', 'Your withdraw is completed successfully.', '<p>Hello {customer_name},<br>Your withdraw is completed successfully.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>Your withdraw is completed successfully.</p><p>Thank You<br></p>', 1),
(5, 'Deposit', 'You have invested successfully.', '<p>Hello {customer_name},<br>You have deposited successfully.</p><p>Transaction ID:&nbsp;<span style=\"color: rgb(33, 37, 41);\">{order_number}.</span></p><p>Thank You.</p>', '<p>Hello {customer_name},<br>You have deposited successfully.</p><p>Transaction ID:&nbsp;<span style=\"color: rgb(33, 37, 41);\">{order_number}.</span></p><p>Thank You.</p>', 1),
(6, 'Invest', 'Your invest successfully completed.', '<p>Hello {customer_name},<br>Your invest successfully completed.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>Your invest successfully completed.</p><p>Thank You<br></p>', 1),
(7, 'password changed', 'Your password has been changed', '<p>Hello {customer_name},<br>Your password has been changed successfully.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>Your password has been changed successfully.</p><p>Thank You<br></p>', 1),
(8, 'profile update', 'Your profile has been update', '<p>Hello {customer_name},<br>Your profile has been updated successfully.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>Your profile has been updated successfully.</p><p>Thank You<br></p>', 1),
(9, 'referral bonus', 'Referral Bonus', '<p>Hello {customer_name},<br>You got bonus from referral.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>You got bonus from referral.</p><p>Thank You<br></p>', 1),
(10, 'balance transfer', 'Balance Transfer', '<p>Hello {customer_name},</p><p>You got amount from your friend.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>You got amount from your friend.</p><p>Thank You<br></p>', 1),
(11, 'subscription', 'Subscription', '<p>Hello {customer_name},</p><p>You got amount from your friend.</p><p>Thank You<br></p>', '<p>Hello {customer_name},<br>You got amount from your friend.</p><p>Thank You<br></p>', 1),
(12, 'property approve', 'property approve', '<p>Hello {customer_name},</p><p>Your property approve by admin.</p><p>Thank You<br></p>', '<p>Hello {customer_name},</p><p>Your property approve by admin.</p><p>Thank You<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `details` text NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `details`, `status`) VALUES
(1, 'Right my front it wound cause fully', 'Aut, expedita optio? Quis ab laudantium, facilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo?\r\n \r\nFacilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo? Dignissimos beatae officia repellat maiores!', 1),
(3, 'Man particular insensible celebrated', 'Aut, expedita optio? Quis ab laudantium, facilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo?\r\n \r\nFacilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo? Dignissimos beatae officia repellat maiores!', 1),
(4, 'Qui ducimus praesentium ullam voluptatem?', 'Aut, expedita optio? Quis ab laudantium, facilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo?\r\n \r\nFacilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo? Dignissimos beatae officia repellat maiores!', 0),
(5, 'Sunt soluta laborum dolore voluptas natus?', 'Aut, expedita optio? Quis ab laudantium, facilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo?\r\n\r\n Facilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo? Dignissimos beatae officia repellat maiores!', 0),
(6, 'Possimus expedita dolorum fugit mollitia, optio quo?', 'Aut, expedita optio? Quis ab laudantium, facilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo?\r\n \r\nFacilis similique est alias, possimus expedita dolorum fugit mollitia, optio quo? Dignissimos beatae officia repellat maiores!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `floor_plans`
--

CREATE TABLE `floor_plans` (
  `id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floor_plans`
--

INSERT INTO `floor_plans` (`id`, `property_id`, `name`, `size`, `photo`, `created_at`, `updated_at`) VALUES
(1, 13, 'First Floor', '740 sq ft', 'J8isOeRI1689223780.jpg', '2023-07-13 04:49:40', '2023-07-13 05:17:28'),
(2, 13, 'Second Floor', '710 sq ft', '6chgue3g1689224644.jpg', '2023-07-13 05:04:04', '2023-07-13 05:04:04'),
(3, 13, 'Third Floor', '520 sq ft', 'hW9PIgod1689224778.jpg', '2023-07-13 05:06:18', '2023-07-13 05:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `font_family` varchar(255) DEFAULT NULL,
  `font_value` varchar(255) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `font_family`, `font_value`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Rubik', 'Rubik', 0, '2021-09-07 22:34:28', '2023-03-13 22:47:25'),
(2, 'Roboto', 'Roboto', 0, '2021-09-07 22:35:10', '2023-03-13 22:47:25'),
(3, 'New Tegomin', 'New+Tegomin', 0, '2021-09-07 22:35:23', '2023-03-13 22:47:25'),
(5, 'Open Sans', 'Open+Sans', 0, '2021-09-07 22:44:49', '2023-03-13 22:47:25'),
(11, 'Manrope', 'Manrope', 0, '2022-03-03 09:24:26', '2023-03-13 22:47:25'),
(12, 'Jost', 'Jost', 1, '2023-03-13 05:51:33', '2023-03-13 22:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `property_id`, `photo`, `created_at`, `updated_at`) VALUES
(15, 10, 'gal-1.jpg', '2022-12-19 11:05:06', '2022-12-19 11:05:06'),
(16, 10, 'gal-2.jpg', '2022-12-19 11:05:06', '2022-12-19 11:05:06'),
(17, 10, 'gal-3.jpg', '2022-12-19 11:05:06', '2022-12-19 11:05:06'),
(18, 6, 'gal-1.jpg', '2022-12-19 11:05:45', '2022-12-19 11:05:45'),
(19, 6, 'gal-2.jpg', '2022-12-19 11:05:45', '2022-12-19 11:05:45'),
(20, 6, 'gal-3.jpg', '2022-12-19 11:05:45', '2022-12-19 11:05:45'),
(23, 8, 'gal-1.jpg', '2022-12-19 11:06:06', '2022-12-19 11:06:06'),
(24, 8, 'gal-2.jpg', '2022-12-19 11:06:06', '2022-12-19 11:06:06'),
(25, 8, 'gal-3.jpg', '2022-12-19 11:06:06', '2022-12-19 11:06:06'),
(28, 11, 'gal-1.jpg', '2022-12-19 11:06:51', '2022-12-19 11:06:51'),
(29, 11, 'gal-2.jpg', '2022-12-19 11:06:51', '2022-12-19 11:06:51'),
(30, 11, 'gal-3.jpg', '2022-12-19 11:06:51', '2022-12-19 11:06:51'),
(32, 12, 'gal-1.jpg', '2022-12-19 11:07:21', '2022-12-19 11:07:21'),
(33, 12, 'gal-2.jpg', '2022-12-19 11:07:21', '2022-12-19 11:07:21'),
(34, 12, 'gal-3.jpg', '2022-12-19 11:07:21', '2022-12-19 11:07:21'),
(36, 13, 'gal-1.jpg', '2022-12-19 11:07:48', '2022-12-19 11:07:48'),
(37, 13, 'gal-2.jpg', '2022-12-19 11:07:48', '2022-12-19 11:07:48'),
(38, 13, 'gal-3.jpg', '2022-12-19 11:07:48', '2022-12-19 11:07:48'),
(41, 17, 'gal-1.jpg', '2023-01-22 09:38:22', '2023-01-22 09:38:22'),
(42, 17, 'gal-2.jpg', '2023-01-22 09:38:22', '2023-01-22 09:38:22'),
(43, 17, 'gal-3.jpg', '2023-01-22 09:38:22', '2023-01-22 09:38:22'),
(56, 23, 'gal-1.jpg', '2023-02-01 09:52:20', '2023-02-01 09:52:20'),
(57, 23, 'gal-2.jpg', '2023-02-01 09:52:20', '2023-02-01 09:52:20'),
(58, 23, 'gal-3.jpg', '2023-02-01 09:52:20', '2023-02-01 09:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int(11) NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) NOT NULL,
  `loader` varchar(191) NOT NULL,
  `admin_loader` varchar(191) DEFAULT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `header_email` text DEFAULT NULL,
  `header_phone` text DEFAULT NULL,
  `footer` text NOT NULL,
  `copyright` text NOT NULL,
  `colors` varchar(191) DEFAULT NULL,
  `is_talkto` tinyint(1) NOT NULL DEFAULT 1,
  `talkto` text DEFAULT NULL,
  `is_language` tinyint(1) NOT NULL DEFAULT 1,
  `is_loader` tinyint(1) NOT NULL DEFAULT 1,
  `map_key` text DEFAULT NULL,
  `is_disqus` tinyint(1) NOT NULL DEFAULT 0,
  `disqus` longtext DEFAULT NULL,
  `is_contact` tinyint(1) NOT NULL DEFAULT 0,
  `is_faq` tinyint(1) NOT NULL DEFAULT 0,
  `is_maintain` tinyint(4) NOT NULL DEFAULT 0,
  `maintain_text` text DEFAULT NULL,
  `day_of` longtext DEFAULT NULL,
  `withdraw_status` tinyint(4) NOT NULL DEFAULT 0,
  `smtp_host` varchar(191) NOT NULL,
  `smtp_port` varchar(191) NOT NULL,
  `smtp_encryption` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(191) NOT NULL,
  `smtp_pass` varchar(191) NOT NULL,
  `from_email` varchar(191) NOT NULL,
  `from_name` varchar(191) NOT NULL,
  `is_smtp` tinyint(1) NOT NULL DEFAULT 0,
  `is_currency` tinyint(1) NOT NULL DEFAULT 0,
  `currency_format` tinyint(1) NOT NULL DEFAULT 0,
  `subscribe_success` text DEFAULT NULL,
  `subscribe_error` text DEFAULT NULL,
  `error_title` text DEFAULT NULL,
  `error_text` text DEFAULT NULL,
  `error_photo` varchar(191) DEFAULT NULL,
  `breadcumb_banner` varchar(191) DEFAULT NULL,
  `is_admin_loader` tinyint(1) NOT NULL DEFAULT 0,
  `currency_code` varchar(191) DEFAULT NULL,
  `currency_sign` varchar(191) DEFAULT NULL,
  `is_verification_email` tinyint(1) NOT NULL DEFAULT 0,
  `withdraw_fee` double NOT NULL DEFAULT 0,
  `withdraw_charge` double NOT NULL DEFAULT 0,
  `is_affilate` tinyint(1) NOT NULL DEFAULT 1,
  `affilate_charge` double NOT NULL DEFAULT 0,
  `affilate_banner` text DEFAULT NULL,
  `secret_string` varchar(255) DEFAULT NULL,
  `gap_limit` int(11) NOT NULL DEFAULT 300,
  `isWallet` tinyint(4) NOT NULL DEFAULT 0,
  `affilate_new_user` int(11) NOT NULL DEFAULT 0,
  `affilate_user` int(11) NOT NULL DEFAULT 0,
  `footer_logo` varchar(191) DEFAULT NULL,
  `pm_account` varchar(191) DEFAULT NULL,
  `is_pm` tinyint(4) DEFAULT 0,
  `cc_api_key` varchar(191) DEFAULT NULL,
  `balance_transfer` tinyint(4) NOT NULL DEFAULT 0,
  `twilio_account_sid` varchar(255) DEFAULT NULL,
  `twilio_auth_token` varchar(255) DEFAULT NULL,
  `twilio_default_number` varchar(255) DEFAULT NULL,
  `twilio_status` tinyint(4) NOT NULL DEFAULT 0,
  `nexmo_key` varchar(255) DEFAULT NULL,
  `nexmo_secret` varchar(255) DEFAULT NULL,
  `nexmo_default_number` varchar(255) DEFAULT NULL,
  `nexmo_status` tinyint(4) NOT NULL DEFAULT 0,
  `send_sms` tinyint(4) NOT NULL DEFAULT 1,
  `two_factor` tinyint(4) NOT NULL DEFAULT 0,
  `kyc` tinyint(4) NOT NULL DEFAULT 0,
  `menu` text DEFAULT NULL,
  `is_ssl` tinyint(4) NOT NULL DEFAULT 1,
  `is_cookie` tinyint(4) NOT NULL DEFAULT 1,
  `cookie_text` text DEFAULT NULL,
  `cookie_button` varchar(255) DEFAULT NULL,
  `transfer_fixed` double DEFAULT NULL,
  `transfer_percentage` double DEFAULT NULL,
  `transfer_min` double DEFAULT NULL,
  `transfer_max` double DEFAULT NULL,
  `fixed_request_charge` double DEFAULT NULL,
  `percentage_request_charge` double DEFAULT NULL,
  `minimum_request_money` double DEFAULT NULL,
  `maximum_request_money` double DEFAULT NULL,
  `module_section` longtext DEFAULT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `time_zone` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `logo`, `favicon`, `loader`, `admin_loader`, `banner`, `title`, `header_email`, `header_phone`, `footer`, `copyright`, `colors`, `is_talkto`, `talkto`, `is_language`, `is_loader`, `map_key`, `is_disqus`, `disqus`, `is_contact`, `is_faq`, `is_maintain`, `maintain_text`, `day_of`, `withdraw_status`, `smtp_host`, `smtp_port`, `smtp_encryption`, `smtp_user`, `smtp_pass`, `from_email`, `from_name`, `is_smtp`, `is_currency`, `currency_format`, `subscribe_success`, `subscribe_error`, `error_title`, `error_text`, `error_photo`, `breadcumb_banner`, `is_admin_loader`, `currency_code`, `currency_sign`, `is_verification_email`, `withdraw_fee`, `withdraw_charge`, `is_affilate`, `affilate_charge`, `affilate_banner`, `secret_string`, `gap_limit`, `isWallet`, `affilate_new_user`, `affilate_user`, `footer_logo`, `pm_account`, `is_pm`, `cc_api_key`, `balance_transfer`, `twilio_account_sid`, `twilio_auth_token`, `twilio_default_number`, `twilio_status`, `nexmo_key`, `nexmo_secret`, `nexmo_default_number`, `nexmo_status`, `send_sms`, `two_factor`, `kyc`, `menu`, `is_ssl`, `is_cookie`, `cookie_text`, `cookie_button`, `transfer_fixed`, `transfer_percentage`, `transfer_min`, `transfer_max`, `fixed_request_charge`, `percentage_request_charge`, `minimum_request_money`, `maximum_request_money`, `module_section`, `phone_code`, `latitude`, `longitude`, `version`, `time_zone`) VALUES
(1, 'Nblr6awE1687321612.png', 'Yo7c3v0R1650180806.png', '5monWltX1641808745.gif', '33CiUFaI1641808748.gif', '1563350277herobg.jpg', 'Resido - Residence & Real Estate HTML Template', 'Info@example.com', '0123 456789', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae', 'COPYRIGHT © 2023. All Rights Reserved By <a href=\"http://geniusocean.com/\">GeniusOcean.com</a>', '#0fca98', 0, '5bc2019c61d0b77092512d03', 1, 1, 'AIzaSyB1GpE4qeoJ__70UZxvX9CTMUTZRZNHcu8', 1, 'newspaper-7', 1, 1, 0, 'Website under Maintenance', NULL, 1, 'smtp.mailtrap.io', '2525', 'tls', 'df3da325f3ec48', '8e18def867639a', 'geniushyip@demo.royalscripts.com', 'GeniusOcean', 1, 1, 1, 'You are subscribed Successfully.', 'This email has already been taken.', 'OOPS ! ... PAGE NOT FOUND', '<span style=\"color:rgb(78,92,121);font-family:Jost;font-size:15px;text-align:center;\">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</span>', 'ZeKAWKYf1679288917.png', 'bz7UDSRk1659607876.png', 1, 'USD', '$', 0, 5, 5, 1, 5, '16406712051566471347add.jpg', 'ZzsMLGKe162CfA5EcG6j', 3000, 1, 5, 5, 'cmw426uS1687321623.png', 'U36807958', 1, 'cdb2163c-91cc-4fa6-b3fc-7de11bdcdf1a', 1, 'ACd265bfb214658e0a059aad4df96a9543', '0df1506100f991f8c9b144c745e9b133', '19793786208', 0, 'ba9111b8', 'cgxbAg4KnE80bcKx', '01976814812', 1, 1, 0, 0, '{\"Home\":{\"title\":\"Home\",\"dropdown\":\"no\",\"href\":\"\\/\",\"target\":\"self\"},\"About\":{\"title\":\"About\",\"dropdown\":\"no\",\"href\":\"\\/about\",\"target\":\"self\"},\"Plans\":{\"title\":\"Plans\",\"dropdown\":\"no\",\"href\":\"\\/plans\",\"target\":\"self\"},\"Blog\":{\"title\":\"Blog\",\"dropdown\":\"no\",\"href\":\"\\/blogs\",\"target\":\"self\"}}', 1, 1, '<p>Your experience on this site will be improved by allowing cookiessss.<br></p>', 'Allow Cookies', 1, 0.3, 10, 1000, 1, 0.3, 1000, 5000, NULL, '+880', '23.8759', '90.3795', '2.0', 'Asia/Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `invests`
--

CREATE TABLE `invests` (
  `id` int(11) NOT NULL,
  `transaction_no` varchar(100) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `property_owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `hold_amount` double NOT NULL DEFAULT 0,
  `return_amount` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `profit_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invests`
--

INSERT INTO `invests` (`id`, `transaction_no`, `property_id`, `property_owner_id`, `owner_type`, `user_id`, `amount`, `hold_amount`, `return_amount`, `status`, `profit_time`, `created_at`, `updated_at`) VALUES
(10, 'ov82aHHrJKMI', 17, 1, 'admin', 102, 500, 0, 700, 2, '2026-02-01 08:17:32', '2023-02-01 08:17:32', '2023-02-01 09:04:28'),
(12, 'aOMK2P6vOSkD', 17, 1, 'admin', 104, 500, 0, 700, 1, '2026-03-12 01:57:04', '2023-03-12 01:57:04', '2023-03-12 01:57:04'),
(13, 'SVhz3HVgzyxC', 17, 1, 'admin', 86, 500, 0, 700, 1, '2026-03-13 03:56:10', '2023-03-13 03:56:10', '2023-03-13 03:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `language` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `rtl`, `is_default`, `language`, `name`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'EN', '1636017050KyjRNauw', '1636017050KyjRNauw.json', NULL, NULL),
(17, 0, 0, 'HI', '1678683444L44OGYqm', '1678683444L44OGYqm.json', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `slug`, `parent_id`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'bangladesh', NULL, 'OKWnj7vI1671443336.png', 1, '2022-11-22 04:44:40', '2023-09-25 05:02:09'),
(3, 'Nepal', 'nepal', NULL, 'utnmhMuo1671443325.png', 1, '2022-11-22 05:17:53', '2023-09-25 05:02:24'),
(4, 'India', 'india', NULL, 'NexwCftH1671443315.png', 1, '2022-11-22 05:38:18', '2023-09-25 05:01:53'),
(5, 'Indonesia', 'indonesia', NULL, 'rK3pJfKb1671443301.png', 1, '2022-11-22 05:38:35', '2023-09-25 05:01:32'),
(6, 'United Kingdom', 'united-kingdom', NULL, '393kYgcs1671443290.png', 1, '2022-11-22 05:39:09', '2023-09-25 05:01:02'),
(7, 'Pakistan', 'pakistan', NULL, 'aRBJVcD11671509233.png', 1, '2022-12-19 09:47:40', '2023-09-25 05:00:43'),
(10, 'Ireland', 'ireland', NULL, 'wIKStIGZ1695617711.jpg', 1, '2023-09-25 04:55:11', '2023-09-25 04:55:11'),
(11, 'Italy', 'italy', NULL, '8sgnwUmF1695618321.png', 1, '2023-09-25 05:05:21', '2023-09-25 05:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_26_221915_create_coinpayment_transactions_table', 1),
(2, '2020_11_30_030150_create_coinpayment_transaction_items_table', 1),
(3, '2022_02_06_050222_create_wire_transfer_banks_table', 1),
(4, '2022_02_13_094244_create_bank_plans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `order_id`, `user_id`, `vendor_id`, `product_id`, `conversation_id`, `is_read`, `created_at`, `updated_at`) VALUES
(187, NULL, 99, NULL, NULL, NULL, 0, '2022-09-25 08:05:28', '2022-09-25 08:05:28'),
(188, NULL, 102, NULL, NULL, NULL, 0, '2022-12-22 09:02:53', '2022-12-22 09:02:53'),
(189, NULL, 105, NULL, NULL, NULL, 0, '2023-01-02 04:46:43', '2023-01-02 04:46:43'),
(190, NULL, 106, NULL, NULL, NULL, 0, '2023-02-01 11:21:15', '2023-02-01 11:21:15'),
(191, NULL, 107, NULL, NULL, NULL, 0, '2023-09-06 23:46:43', '2023-09-06 23:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `property_owner_id` int(11) DEFAULT NULL,
  `transaction_no` varchar(255) DEFAULT NULL,
  `charge_id` varchar(255) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `amount` double DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `property_id`, `property_owner_id`, `transaction_no`, `charge_id`, `txnid`, `amount`, `method`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 104, 12, 86, 'lMNytK6HMSfL', 'ch_3MJYtdJlIV5dN9n70crZuZiB', 'txn_3MJYtdJlIV5dN9n70aGm09PP', 1800, 'stripe', NULL, 1, '2022-12-27 08:52:29', '2022-12-27 08:52:29'),
(2, 104, 13, 86, 'Au8J7MsKWqPu', 'ch_3MJZEoJlIV5dN9n70Dr22jIu', 'txn_3MJZEoJlIV5dN9n70aVMNfAC', 2850, 'stripe', NULL, 1, '2022-12-27 09:14:23', '2022-12-27 09:14:23'),
(3, 102, 12, 86, 'TZeESWl2wMOQ', 'ch_3MJbO7JlIV5dN9n70MsQpADD', 'txn_3MJbO7JlIV5dN9n70hhoq4xJ', 1800, 'stripe', NULL, 1, '2022-12-27 11:32:07', '2022-12-27 11:32:07'),
(4, 102, 12, 86, 'MvlBnI8ijgpx', 'ch_3MVoogJlIV5dN9n71WH7u8UO', 'txn_3MVoogJlIV5dN9n71mKbvpyc', 1800, 'stripe', NULL, 1, '2023-01-30 04:18:03', '2023-01-30 04:18:03'),
(5, 102, 13, 86, 'ZfmT35rpyjVE', 'ch_3MVtn4JlIV5dN9n70NfwowAc', 'txn_3MVtn4JlIV5dN9n70Jq8CZhA', 2850, 'stripe', NULL, 1, '2023-01-30 09:36:42', '2023-01-30 09:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` tinyint(1) NOT NULL DEFAULT 0,
  `footer` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `details`, `meta_tag`, `meta_description`, `header`, `footer`, `status`) VALUES
(1, 'About Us', 'about', '<div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2><font size=\"6\">Title number 1</font><br></h2><p><span style=\"font-weight: 700;\">Lorem Ipsum</span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2><font size=\"6\">Title number 2</font><br></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\"><h2><font size=\"6\">Title number 3</font><br></h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><h2 helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-weight:=\"\" 700;=\"\" line-height:=\"\" 1.1;=\"\" color:=\"\" rgb(51,=\"\" 51,=\"\" 51);=\"\" margin:=\"\" 0px=\"\" 15px;=\"\" font-size:=\"\" 30px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\" style=\"font-family: \" 51);\"=\"\"><font size=\"6\">Title number 9</font><br></h2><p helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" text-decoration-style:=\"\" initial;=\"\" text-decoration-color:=\"\" initial;\"=\"\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', NULL, NULL, 1, 0, 1),
(2, 'Privacy & Policy', 'privacy', '<h3>Title number 1</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<br>\r\n<h3>Title number 2</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<br>\r\n<h3>Title number 3</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<br>\r\n<h3>Title number 4</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'test,test1,test2,test3', 'Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 0, 1, 1),
(4, 'Support', 'support', '<h3>Title number 1</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<br>\r\n<h3>Title number 2</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<br>\r\n<h3>Title number 3</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<br>\r\n<h3>Title number 4</h3>\r\n<br>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pagesettings`
--

CREATE TABLE `pagesettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_success` varchar(191) NOT NULL,
  `contact_email` varchar(191) NOT NULL,
  `contact_title` text DEFAULT NULL,
  `contact_text` text DEFAULT NULL,
  `side_title` text DEFAULT NULL,
  `side_text` text DEFAULT NULL,
  `street` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `site` text DEFAULT NULL,
  `login_banner` varchar(255) DEFAULT NULL,
  `login_title` varchar(255) DEFAULT NULL,
  `login_subtitle` text DEFAULT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `banner_subtitle` varchar(255) DEFAULT NULL,
  `hero_photo` varchar(255) DEFAULT NULL,
  `review_blog` tinyint(1) NOT NULL DEFAULT 1,
  `pricing_plan` tinyint(1) NOT NULL DEFAULT 0,
  `plan_title` varchar(255) DEFAULT NULL,
  `plan_subtitle` text DEFAULT NULL,
  `explore_ptitle` varchar(255) DEFAULT NULL,
  `explore_psub` text DEFAULT NULL,
  `location_title` varchar(255) DEFAULT NULL,
  `location_subtitle` text DEFAULT NULL,
  `feature_ptitle` varchar(255) DEFAULT NULL,
  `feature_psub` text DEFAULT NULL,
  `about_text` text DEFAULT NULL,
  `about_link` varchar(255) DEFAULT NULL,
  `about_details` longtext DEFAULT NULL,
  `download_title` varchar(255) DEFAULT NULL,
  `download_subtitle` varchar(255) DEFAULT NULL,
  `download_text` text DEFAULT NULL,
  `download_photo` varchar(255) DEFAULT NULL,
  `google_play_link` varchar(255) DEFAULT NULL,
  `app_store_link` varchar(255) DEFAULT NULL,
  `footer_top_photo` varchar(255) DEFAULT NULL,
  `footer_top_title` varchar(255) DEFAULT NULL,
  `footer_top_text` varchar(255) DEFAULT NULL,
  `app_banner` varchar(255) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_subtitle` varchar(255) DEFAULT NULL,
  `review_title` varchar(255) DEFAULT NULL,
  `review_photo` varchar(255) DEFAULT NULL,
  `review_subtitle` text DEFAULT NULL,
  `call_title` varchar(255) DEFAULT NULL,
  `call_subtitle` varchar(255) DEFAULT NULL,
  `call_button` varchar(100) DEFAULT NULL,
  `call_button_link` varchar(255) DEFAULT NULL,
  `call_bg` varchar(100) DEFAULT NULL,
  `home_module` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagesettings`
--

INSERT INTO `pagesettings` (`id`, `contact_success`, `contact_email`, `contact_title`, `contact_text`, `side_title`, `side_text`, `street`, `phone`, `email`, `site`, `login_banner`, `login_title`, `login_subtitle`, `banner_title`, `banner_subtitle`, `hero_photo`, `review_blog`, `pricing_plan`, `plan_title`, `plan_subtitle`, `explore_ptitle`, `explore_psub`, `location_title`, `location_subtitle`, `feature_ptitle`, `feature_psub`, `about_text`, `about_link`, `about_details`, `download_title`, `download_subtitle`, `download_text`, `download_photo`, `google_play_link`, `app_store_link`, `footer_top_photo`, `footer_top_title`, `footer_top_text`, `app_banner`, `blog_title`, `blog_subtitle`, `review_title`, `review_photo`, `review_subtitle`, `call_title`, `call_subtitle`, `call_button`, `call_button_link`, `call_bg`, `home_module`) VALUES
(1, 'Success! Thanks for contacting us, we will get back to you shortly.', 'demo@example.com', '<h4 class=\"subtitle\" style=\"margin-bottom: 6px; font-weight: 600; line-height: 28px; font-size: 28px; text-transform: uppercase;\">WE\'D LOVE TO</h4><h2 class=\"title\" style=\"margin-bottom: 13px;font-weight: 600;line-height: 50px;font-size: 40px;color: #1f71d4;text-transform: uppercase;\">HEAR FROM YOU</h2>', '<span style=\"color: rgb(119, 119, 119);\">Send us a message and we\' ll respond as soon as possible</span><br>', '<h2 style=\"outline: none; font-weight: 700; line-height: 36px; font-size: 30px; color: rgb(45, 57, 84); text-transform: capitalize; font-family: Manrope;\">Get In Touch</h2>', '<span style=\"color: rgb(78, 92, 121); font-family: Jost, sans-serif; font-size: 15px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br></span>', '<span style=\"color: rgb(78, 92, 121); font-family: Jost, sans-serif; font-size: 15px;\">2512, New Market,<br></span><span style=\"color: rgb(78, 92, 121); font-family: Jost, sans-serif; font-size: 15px;\">Eliza Road, Sincher 80 CA,<br></span><span style=\"color: rgb(78, 92, 121); font-family: Jost, sans-serif; font-size: 15px;\">Canada, USA</span><span style=\"color: rgb(78, 92, 121); font-family: Jost, sans-serif; font-size: 15px;\"><br></span>', '+0123456789', 'admin@geniusocean.com', 'https://geniusocean.com/', 'CkzTngcE1649742892.png', 'Turn Your ideas into Reality', 'Change your lifestyle signing up here. Invest and easily earn money for much better life', 'Find Your Perfect Place..', 'Amet consectetur adipisicing', 'ysVVESju1687321102.jpg', 1, 1, 'See Our Packages', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores', 'Explore Good Places.', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores', 'Find By Locations', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolore', 'Featured Property For Sale', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores', 'Eius modi soluta, sunt nulla odio deserunt aliquam tenetur commodi esse eveniet repellendus culpa neque? Molestiae officia architecto laborum ipsam.\r\n<br><br>\r\nQuis debitis at dolorem dolorum quae? Cum possimus natus esse molestias quaerat quo tempore harum, velit doloremque, facere labore assumenda sed explicabo. Temporibus illum, aliquid, voluptatem sint culpa fugit consequuntur in animi magni rerum distinctio sed ut libero incidunt sapiente.', 'https://www.google.com/', 'Quibusdam at sunt molestias et iusto eos rerum minima facere\r\n<br>\r\nAmet error praesentium perspiciatis harum ratione vitae ipsam accusamus, rem rerum. Molestias explicabo laborum sint voluptate totam incidunt repellendus dignissimos ipsam adipisci. Placeat consequuntur, iure quibusdam at sunt molestias et iusto eos rerum minima facere, dolores tempore. Accusamus quo omnis nam natus, temporibus eaque labore. Quasi architecto vitae veniam laudantium. Voluptates, incidunt.\r\n<br><br>\r\nQuibusdam at sunt molestias et iusto eos rerum minima facere\r\n<br>\r\nAmet error praesentium perspiciatis harum ratione vitae ipsam accusamus, rem rerum. Molestias explicabo laborum sint voluptate totam incidunt repellendus dignissimos ipsam adipisci. Placeat consequuntur, iure quibusdam at sunt molestias et iusto eos rerum minima facere, dolores tempore. Accusamus quo omnis nam natus, temporibus eaque labore. Quasi architecto vitae veniam laudantium. Voluptates, incidunt.', 'Download apps', 'Download App Free App For Android And IPhone', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto accusantium.', 'Mk2b6Ve81671617128.png', 'https://play.google.com/store/games?hl=en&gl=US&pli=1', 'https://play.google.com/store/games?hl=en&gl=US&pli=1', '1639561929call-to-action-bg.jpg', 'GET STARTED TODAY WITH BITCOIN', 'Open account for free and start trading Bitcoins!', 'gFNRbRDL1645425298.png', 'Our Latest News & Tips', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolor', 'Are You Convenced', 'xMNVZ0BW1688531596.png', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores', 'Want to Become a Real Estate Agent??', 'We\'ll help you to grow your career and growth..', 'Signup Today', 'http://localhost/geniusrealestate/become/agent', '#1b66e3', '[\"Banner\",\"Explore Property\",\"Location\",\"Testimonials\",\"Blogs\",\"CTAs\"]');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` int(11) NOT NULL,
  `subtitle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('manual','automatic') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'manual',
  `information` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) DEFAULT NULL,
  `currency_id` varchar(191) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `subtitle`, `title`, `details`, `name`, `type`, `information`, `keyword`, `currency_id`, `status`) VALUES
(6, NULL, NULL, NULL, 'Flutter Wave', 'automatic', '{\"public_key\":\"FLWPUBK_TEST-299dc2c8bf4c7f14f7d7f48c32433393-X\",\"secret_key\":\"FLWSECK_TEST-afb1f2a4789002d7c0f2185b830450b7-X\",\"text\":\"Pay via your Flutter Wave account.\"}', 'flutterwave', '[\"1\"]', 1),
(8, NULL, NULL, NULL, 'Authorize.Net', 'automatic', '{\"login_id\":\"76zu9VgUSxrJ\",\"txn_key\":\"2Vj62a6skSrP5U3X\",\"sandbox_check\":1,\"text\":\"Pay Via Authorize.Net\"}', 'authorize.net', '[\"1\"]', 1),
(9, NULL, NULL, NULL, 'Razorpay', 'automatic', '{\"key\":\"rzp_test_xDH74d48cwl8DF\",\"secret\":\"cr0H1BiQ20hVzhpHfHuNbGri\",\"text\":\"Pay via your Razorpay account.\"}', 'razorpay', '[\"8\"]', 1),
(11, NULL, NULL, NULL, 'Paytm', 'automatic', '{\"merchant\":\"tkogux49985047638244\",\"secret\":\"LhNGUUKE9xCQ9xY8\",\"website\":\"WEBSTAGING\",\"industry\":\"Retail\",\"sandbox_check\":1,\"text\":\"Pay via your Paytm account.\"}', 'paytm', '[\"8\"]', 1),
(12, NULL, NULL, NULL, 'Paystack', 'automatic', '{\"key\":\"pk_test_162a56d42131cbb01932ed0d2c48f9cb99d8e8e2\",\"email\":\"junnuns@gmail.com\",\"text\":\"Pay via your Paystack account.\"}', 'paystack', '[\"9\"]', 1),
(13, NULL, NULL, NULL, 'Instamojo', 'automatic', '{\"key\":\"test_172371aa837ae5cad6047dc3052\",\"token\":\"test_4ac5a785e25fc596b67dbc5c267\",\"sandbox_check\":1,\"text\":\"Pay via your Instamojo account.\"}', 'instamojo', '[\"8\"]', 1),
(14, NULL, NULL, NULL, 'Stripe', 'automatic', '{\"key\":\"pk_test_UnU1Coi1p5qFGwtpjZMRMgJM\",\"secret\":\"sk_test_QQcg3vGsKRPlW6T3dXcNJsor\",\"text\":\"Pay via your Credit Card.\"}', 'stripe', '[\"1\"]', 1),
(15, NULL, NULL, NULL, 'Paypal', 'automatic', '{\"client_id\":\"AcWYnysKa_elsQIAnlfsJXokR64Z31CeCbpis9G3msDC-BvgcbAwbacfDfEGSP-9Dp9fZaGgD05pX5Qi\",\"client_secret\":\"EGZXTq6d6vBPq8kysVx8WQA5NpavMpDzOLVOb9u75UfsJ-cFzn6aeBXIMyJW2lN1UZtJg5iDPNL9ocYE\",\"sandbox_check\":1,\"text\":\"Pay via your PayPal account.\"}', 'paypal', '[\"1\"]', 1),
(27, 'mobile money', 'bKash', '<p><span style=\"font-weight: bolder;\">Please send money using number<br>123456789</span><br></p>', NULL, 'manual', NULL, NULL, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `plan_type` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price_color` varchar(255) DEFAULT NULL,
  `post_limit` int(11) DEFAULT NULL,
  `post_duration` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `attribute` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `subtitle`, `plan_type`, `price`, `price_color`, `post_limit`, `post_duration`, `status`, `attribute`, `created_at`, `updated_at`) VALUES
(1, 'basic package', 'Most Popular', 'life_time', 49, '#fd5332', 5, 90, 1, '[\"5+ Listings\",\"Contact With Agent\",\"3 Month Validity\",\"7x24 Fully Support\",\"50GB Space\"]', '2022-03-24 08:35:02', '2022-12-19 06:42:42'),
(2, 'platinum package', 'Most Popular', 'monthly', 99, '#27cc8f', 5, 90, 1, '[\"5+ Listings\",\"Contact With Agent\",\"3 Month Validity\",\"7x24 Fully Support\",\"50GB Space\"]', '2022-03-24 08:46:00', '2022-12-19 06:44:51'),
(4, 'standard package', 'Most Popular', 'monthly', 199, '#03a9f4', 5, 90, 1, '[\"5+ Listings\",\"Contact With Agent\",\"3 Month Validity\",\"7x24 Fully Support\",\"50GB Space\"]', '2022-03-30 06:14:11', '2022-12-19 06:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` double DEFAULT NULL,
  `guarantee_amount` double DEFAULT NULL,
  `bed` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `square` int(11) DEFAULT NULL,
  `garage` int(11) DEFAULT NULL,
  `year_built` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `real_address` varchar(100) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `remodel_year` int(11) DEFAULT NULL,
  `pool_size` int(11) DEFAULT NULL,
  `additional_room` varchar(50) DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `equipment` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `embed_video` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `attributes` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `invest_amount` double DEFAULT NULL,
  `funding_amount` double DEFAULT NULL,
  `hold_years` int(11) DEFAULT NULL,
  `min_invest` double DEFAULT NULL,
  `max_invest` double DEFAULT NULL,
  `income_distribution` varchar(100) DEFAULT NULL,
  `gross_yeild` double DEFAULT NULL,
  `payment_duration` varchar(100) DEFAULT NULL,
  `is_feature` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 == ''pending''\r\n1 == ''approved''\r\n2 == ''reject''',
  `is_invest` tinyint(4) NOT NULL DEFAULT 0,
  `expire_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `admin_id`, `name`, `slug`, `description`, `price`, `guarantee_amount`, `bed`, `bathroom`, `square`, `garage`, `year_built`, `area`, `location_id`, `real_address`, `latitude`, `longitude`, `remodel_year`, `pool_size`, `additional_room`, `amenities`, `equipment`, `photo`, `embed_video`, `category_id`, `attributes`, `type`, `invest_amount`, `funding_amount`, `hold_years`, `min_invest`, `max_invest`, `income_distribution`, `gross_yeild`, `payment_duration`, `is_feature`, `status`, `is_invest`, `expire_date`, `created_at`, `updated_at`) VALUES
(6, NULL, NULL, 'Beacon Homes LLC', 'beacon-homes-llc', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4 style=\"font-family: nunito, sans-serif; color: rgb(72, 72, 72); font-size: 18px;\">HIGHLIGHTS</h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(119, 119, 119); font-family: nunito, sans-serif;\"><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>', 7000, NULL, 4, 3, 1800, 1, 2004, 3000, 6, '778 Country St. Panama City, FL', '23.8759', '90.3795', 2022, 120, 'Guest Room', 'Golf field', 'Oven, Electric heater, Geyser', '1.jpg', NULL, 25, '{\"Property Type\":[\"4\",\"5\",\"6\"],\"Amenities\":[\"9\",\"10\",\"11\"]}', 'for_buy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, '2022-11-23 08:34:09', '2022-12-20 05:37:55'),
(8, 86, NULL, 'Banyon Tree Realty', 'banyon-tree-realty', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4 style=\"font-size: 18px; font-family: nunito, sans-serif; color: rgb(72, 72, 72);\">HIGHLIGHTS</h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(119, 119, 119); font-family: nunito, sans-serif;\"><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>', 9200, NULL, 4, 3, 1200, 1, 2008, 10000, 5, 'Quice Market, Canada', '23.8759', '90.3795', 2022, 120, 'Guest Room', 'Golf field, Prayer House, Table tennis', 'Electric heater', '2.jpg', NULL, 24, '{\"Property Type\":[\"3\",\"5\",\"7\"],\"Amenities\":[\"10\",\"12\",\"14\"]}', 'for_buy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, '2022-11-24 05:40:13', '2022-12-20 05:37:12'),
(10, 86, NULL, 'Blue Reef Properties', 'blue-reef-properties', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4 style=\"font-size: 18px; font-family: nunito, sans-serif; color: rgb(72, 72, 72);\">HIGHLIGHTS</h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(119, 119, 119); font-family: nunito, sans-serif;\"><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>', 800, 2400, 3, 2, 800, 1, 2010, 1200, 6, '210 Zirak Road, Canada', '23.8759', '90.3795', 2022, 100, 'Guest Room', 'Golf field', 'Electric heater', '3.jpg', NULL, 26, '{\"Property Type\":[\"2\",\"4\",\"6\",\"8\"],\"Amenities\":[\"9\",\"11\",\"13\"]}', 'for_rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, '2022-11-28 06:38:36', '2022-12-20 05:36:49'),
(11, NULL, NULL, 'Bluebell Real Estate', 'bluebell-real-estate', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4 style=\"font-size: 18px; font-family: nunito, sans-serif; color: rgb(72, 72, 72);\">HIGHLIGHTS</h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(119, 119, 119); font-family: nunito, sans-serif;\"><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>', 6500, NULL, 3, 2, 950, 1, 2008, 2500, 1, 'Quice Market, Canada', '23.8759', '90.3795', 2022, 150, '2', 'Golf field, Prayer House, Table tennis', 'Oven, Electric heater.', '4.jpg', NULL, 25, '{\"Property Type\":[\"2\",\"4\",\"6\",\"8\"],\"Amenities\":[\"9\",\"11\",\"13\"]}', 'for_buy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, '2022-11-29 06:02:01', '2022-12-20 05:36:12'),
(12, 86, NULL, 'Strive Partners Realty', 'strive-partners-realty', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4 style=\"font-size: 18px; font-family: nunito, sans-serif; color: rgb(72, 72, 72);\">HIGHLIGHTS</h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(119, 119, 119); font-family: nunito, sans-serif;\"><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>', 600, 1800, 2, 3, 800, 1, 2020, 1500, 1, '210 Zirak Road, Canada', '23.8759', '90.3795', 1200, 100, 'Guest Room', 'Golf field, Prayer House, Table tennis', 'Oven, Electric heater.', '5.jpg', NULL, 25, '{\"Property Type\":[\"2\",\"4\",\"6\",\"8\"],\"Amenities\":[\"9\",\"12\",\"14\"]}', 'for_rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, '2022-12-01 06:07:03', '2022-12-20 05:34:58'),
(13, 86, NULL, 'Found Property Groupps', 'found-property-group', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Libero sem vitae sed donec conubia integer nisi integer rhoncus imperdiet orci odio libero est integer a integer tincidunt sollicitudin blandit fusce nibh leo vulputate lobortis egestas dapibus faucibus metus conubia maecenas cras potenti cum hac arcu rhoncus nullam eros dictum torquent integer cursus bibendum sem sociis molestie tellus purus</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; color: rgb(72, 72, 72); font-family: nunito, sans-serif;\">Quam fusce convallis ipsum malesuada amet velit aliquam urna nullam vehicula fermentum id morbi dis magnis porta sagittis euismod etiam</p><h4 style=\"font-size: 18px; font-family: nunito, sans-serif; color: rgb(72, 72, 72);\">HIGHLIGHTS</h4><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(119, 119, 119); font-family: nunito, sans-serif;\"><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>', 2850, NULL, 4, 2, 850, 1, 2006, 1900, 4, '778 Country St. Panama City, FL', '23.8103', '90.3795', 2020, 150, 'Guest Room', 'Golf field, Prayer House, Table tennis', 'Oven, Electric heater.', '6.jpg', NULL, 25, '{\"Property Type\":[\"2\",\"5\",\"8\"],\"Amenities\":[\"9\",\"12\",\"14\"]}', 'for_buy', NULL, NULL, 342, 2342, NULL, 'yearly', 2342, NULL, 1, 1, 0, NULL, '2022-12-01 08:25:51', '2023-09-18 17:49:54'),
(17, NULL, NULL, 'Studio Apartment, Alpha green tower', 'studio-apartment-alpha-green-tower', '<p>Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower&nbsp;Studio Apartment, Alpha green tower<br></p>', 5000, NULL, 5, 2, 1200, 1, 2022, 2000, 6, '778 Country St. Panama City, FL', '23.8759', '90.3795', 2022, 400, 'Guest Room', 'Golf field', 'Electric heater', '7.jpg', NULL, 24, NULL, 'for_buy', 3010, 7000, 3, 500, 5000, NULL, NULL, NULL, 0, 1, 1, NULL, '2023-01-22 09:38:22', '2023-03-13 03:56:10'),
(23, 86, NULL, 'test property', 'test-property', '<p>test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property&nbsp;test property<br></p>', 5000, NULL, 3, 2, 1200, 1, 2018, 1200, 6, 'Uttara, Dhaka', '23.8759', '90.3795', 2022, 120, 'Guest Room', 'Golf field', 'Electric heater', '8.jpg', NULL, 26, '{\"Property Type\":[\"2\",\"6\",\"8\"],\"Amenities\":[\"12\",\"13\"]}', 'for_rent', 0, 7000, 1, 500, 700, NULL, NULL, 'weekly', 0, 1, 1, NULL, '2023-02-01 09:52:20', '2023-02-08 05:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `property_enquiries`
--

CREATE TABLE `property_enquiries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_owner_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_enquiries`
--

INSERT INTO `property_enquiries` (`id`, `user_id`, `property_owner_id`, `property_id`, `email`, `phone`, `details`, `created_at`, `updated_at`) VALUES
(2, 86, 0, 6, 'user@gmail.com', '0123456789', 'I\'m interested in this property.', '2023-03-14 03:18:09', '2023-03-14 03:18:09'),
(3, 104, 86, 12, 'user@gmail.com', '0123456789', 'I\'m interested in this property.', '2023-03-14 03:36:39', '2023-03-14 03:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `property_reviews`
--

CREATE TABLE `property_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(255) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `view` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_reviews`
--

INSERT INTO `property_reviews` (`id`, `user_id`, `property_owner_id`, `owner_type`, `property_id`, `title`, `message`, `rate`, `view`, `status`, `created_at`, `updated_at`) VALUES
(10, 102, 86, 'user', 13, 'Service', 'I don\'t satisfied with this property. do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 4, 1, 1, '2023-02-08 04:21:21', '2023-03-20 04:17:56'),
(11, 102, 86, 'user', 13, 'Service', 'I don\'t satisfied with this property. do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 3, 1, 2, '2023-02-08 04:21:21', '2023-03-20 04:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `commission_type` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `percent` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `commission_type`, `level`, `percent`, `created_at`, `updated_at`) VALUES
(16, 'invest', 1, 2, '2023-03-20 03:58:16', '2023-03-20 03:58:16'),
(17, 'invest', 2, 3, '2023-03-20 03:58:16', '2023-03-20 03:58:16'),
(18, 'invest', 3, 4, '2023-03-20 03:58:16', '2023-03-20 03:58:16'),
(19, 'invest', 4, 5, '2023-03-20 03:58:16', '2023-03-20 03:58:16'),
(20, 'invest', 5, 6, '2023-03-20 03:58:16', '2023-03-20 03:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `referral_bonuses`
--

CREATE TABLE `referral_bonuses` (
  `id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `amount` decimal(20,10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral_bonuses`
--

INSERT INTO `referral_bonuses` (`id`, `from_user_id`, `to_user_id`, `percentage`, `level`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(9, 107, 86, NULL, NULL, 5.0000000000, 'Register', '2023-09-06 23:46:43', '2023-09-06 23:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `photo`, `title`, `subtitle`, `details`) VALUES
(5, 'sfctPUSO1695632136.jpg', 'Adam Williams', 'CEO Of Microwoft', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.'),
(6, 'LQ0lMoNs1695632123.jpg', 'Shilpa Shethy', 'CEO Of Zapple', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.'),
(9, 'l5ENtikX1695632058.jpg', 'Retha Deowalim', 'Retha Deowalim', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `section` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `section`, `created_at`, `updated_at`) VALUES
(10, 'Staff', 'Menu Builder , Referral , Manage Customers , Deposits , Home Page Manage , Language Manage , Fonts', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `times` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `times`, `created_at`, `updated_at`) VALUES
(4, 86, '8am,9am,10am,11am,12am,2pm,3pm,4pm,5pm,14pm', '2023-01-29 06:03:15', '2023-09-18 17:51:16'),
(5, 0, '8 am,9am,10am,11am,12am,3pm,4pm,5pm', '2023-03-14 02:07:39', '2023-07-16 06:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `seotools`
--

CREATE TABLE `seotools` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_analytics` text DEFAULT NULL,
  `meta_keys` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seotools`
--

INSERT INTO `seotools` (`id`, `google_analytics`, `meta_keys`) VALUES
(1, '<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-137437974-1\"></script>  <script>    window.dataLayer = window.dataLayer || [];    function gtag(){dataLayer.push(arguments);}    gtag(\'js\', new Date());    gtag(\'config\', \'UA-137437974-1\');  </script>', 'Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,Sea');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text DEFAULT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `details`, `photo`) VALUES
(15, 'HIGH LIQUIDITY', 'Fast access to high liquidity orderbook</br>\r\nfor top currency pairs', '1639476836high-liquidity.png'),
(16, 'COST EFFICIENCY', 'Reasonable trading fees for takers</br>\r\nand all market makers', '1639476885cost-efficiency.png'),
(17, 'MOBILE APP', 'Trading via our Mobile App, Available</br>\r\nin Play Store & App Store', '1639476911mobile-app.png'),
(18, 'PAYMENT OPTIONS', 'Popular methods: Visa, MasterCard,</br>\r\nbank transfer, cryptocurrency', '1639476937payment-options.png'),
(19, 'WORLD COVERAGE', 'Providing services in 99% countries</br>\r\naround all the globe', '1639476969world-coverage.png'),
(20, 'STRONG SECURITY', 'Protection against DDoS attacks,</br>\r\nfull data encryption', '1639476998strong-security.png');

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitemap_url` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socialsettings`
--

CREATE TABLE `socialsettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `gplus` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `dribble` varchar(191) DEFAULT NULL,
  `f_status` tinyint(4) NOT NULL DEFAULT 1,
  `g_status` tinyint(4) NOT NULL DEFAULT 1,
  `t_status` tinyint(4) NOT NULL DEFAULT 1,
  `l_status` tinyint(4) NOT NULL DEFAULT 1,
  `d_status` tinyint(4) NOT NULL DEFAULT 1,
  `f_check` tinyint(4) DEFAULT NULL,
  `g_check` tinyint(4) DEFAULT NULL,
  `fclient_id` text DEFAULT NULL,
  `fclient_secret` text DEFAULT NULL,
  `fredirect` text DEFAULT NULL,
  `gclient_id` text DEFAULT NULL,
  `gclient_secret` text DEFAULT NULL,
  `gredirect` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialsettings`
--

INSERT INTO `socialsettings` (`id`, `facebook`, `gplus`, `twitter`, `linkedin`, `dribble`, `f_status`, `g_status`, `t_status`, `l_status`, `d_status`, `f_check`, `g_check`, `fclient_id`, `fclient_secret`, `fredirect`, `gclient_id`, `gclient_secret`, `gredirect`) VALUES
(1, 'https://www.facebook.com/', 'https://plus.google.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://dribbble.com/', 1, 0, 1, 1, 0, 1, 1, '503140663460329', 'f66cd670ec43d14209a2728af26dcc43', 'https://localhost/crypto/auth/facebook/callback', '904681031719-sh1aolu42k7l93ik0bkiddcboghbpcfi.apps.googleusercontent.com', 'yGBWmUpPtn5yWhDAsXnswEX3', 'http://localhost/marketplace/auth/google/callback');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `status`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 1, 'fab fa-facebook-f', 'https://www.facebook.com/', '2022-04-24 09:53:35', '2022-04-24 09:53:35'),
(2, 'Twitter', 1, 'fab fa-twitter', 'https://twitter.com/', '2022-04-24 09:54:37', '2022-04-24 09:54:37'),
(3, 'Linkedin', 1, 'fab fa-linkedin-in', 'https://www.linkedin.com/', '2022-04-24 09:55:23', '2022-04-24 10:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(3, 17, '102485372716947456487', 'google', '2019-06-19 17:06:00', '2019-06-19 17:06:00'),
(4, 18, '109955884428371086401', 'google', '2019-06-19 17:17:04', '2019-06-19 17:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `receiver_id` int(11) DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `profit` enum('plus','minus') DEFAULT NULL,
  `txnid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `receiver_id`, `email`, `amount`, `type`, `profit`, `txnid`, `created_at`, `updated_at`) VALUES
(217, 86, NULL, 'user@gmail.com', 10, 'Subscription', 'minus', 'yaXD1669527650', '2022-11-27 05:41:04', '2022-11-27 05:41:04'),
(218, 86, NULL, 'user@gmail.com', 20, 'Subscription', 'minus', 'L7U41669527723', '2022-11-27 05:42:06', '2022-11-27 05:42:06'),
(219, 86, NULL, 'user@gmail.com', 30, 'Subscription', 'minus', '59MS1669528493', '2022-11-27 05:58:23', '2022-11-27 05:58:23'),
(220, 86, NULL, 'user@gmail.com', 40, 'Subscription', 'minus', '1Y891669528722', '2022-11-27 05:59:42', '2022-11-27 05:59:42'),
(221, 86, NULL, 'user@gmail.com', 50, 'Subscription', 'minus', 'PBsF1669528842', '2022-11-27 06:00:44', '2022-11-27 06:00:44'),
(222, 86, NULL, 'user@gmail.com', 60, 'Subscription', 'minus', '8CrR1669528933', '2022-11-27 06:03:33', '2022-11-27 06:03:33'),
(223, 86, NULL, 'user@gmail.com', 70, 'Subscription', 'minus', 'pnGI1669529677', '2022-11-27 06:15:13', '2022-11-27 06:15:13'),
(224, 86, NULL, 'user@gmail.com', 20, 'Subscription', 'minus', 'I6ty1669633809', '2022-11-28 11:10:12', '2022-11-28 11:10:12'),
(225, 86, NULL, 'user@gmail.com', 199, 'Subscription', 'minus', 'u1pm1671440824', '2022-12-19 09:07:07', '2022-12-19 09:07:07'),
(226, 86, NULL, 'user@gmail.com', 99, 'Subscription', 'minus', 'HvuU1671699111', '2022-12-22 08:52:19', '2022-12-22 08:52:19'),
(227, 86, NULL, 'user@gmail.com', 12.26, 'Payout', 'minus', 'pixcXk7jGb93', '2023-01-03 06:35:17', '2023-01-03 06:35:17'),
(228, 102, NULL, 'rifatbhairab4@gmail.com', 10, 'Deposit', 'plus', 'KLfjIOwfFgyT', '2023-01-25 09:40:07', '2023-01-25 09:40:07'),
(229, 102, NULL, 'rifatbhairab4@gmail.com', 10, 'Deposit', 'plus', 'jx6EyT51jIZL', '2023-01-25 09:45:03', '2023-01-25 09:45:03'),
(230, 102, NULL, 'rifatbhairab4@gmail.com', 10, 'Deposit', 'plus', 'qbKck2JFmORO', '2023-01-25 09:57:01', '2023-01-25 09:57:01'),
(231, 102, NULL, 'rifatbhairab4@gmail.com', 10, 'Deposit', 'plus', 'o80CAoqUi4dR', '2023-01-25 09:58:17', '2023-01-25 09:58:17'),
(232, 86, NULL, 'user@gmail.com', 0.63, 'Payout', 'minus', 'PAx7eSsGmbkR', '2023-01-31 11:23:56', '2023-01-31 11:23:56'),
(233, 86, NULL, 'user@gmail.com', 1.42, 'Payout', 'minus', 'SW1IYMMDMZNE', '2023-02-01 03:39:28', '2023-02-01 03:39:28'),
(234, 86, NULL, 'user@gmail.com', 32.45, 'Payout', 'minus', 'YA34sf5UyOev', '2023-02-01 03:40:16', '2023-02-01 03:40:16'),
(235, 86, NULL, 'user@gmail.com', 10, 'Deposit', 'plus', 'pUePdCl5MrJH', '2023-02-01 04:44:52', '2023-02-01 04:44:52'),
(236, 102, NULL, 'rifatbhairab4@gmail.com', 700, 'Interest Money', 'plus', 'sd1Rsbz9jyvC', '2023-02-01 08:00:33', '2023-02-01 08:00:33'),
(237, 102, NULL, 'rifatbhairab4@gmail.com', 700, 'Interest Money', 'plus', 'C0ZCuCviXGuu', '2023-02-01 09:04:28', '2023-02-01 09:04:28'),
(238, 106, NULL, 'farhad12@gmail.com', 49, 'Subscription', 'minus', 'Ws1c1675310995', '2023-02-02 04:09:58', '2023-02-02 04:09:58'),
(239, 106, NULL, 'farhad12@gmail.com', 49, 'Subscription', 'minus', '7Bjl1675337227', '2023-02-02 11:27:09', '2023-02-02 11:27:09'),
(240, 86, NULL, 'user@gmail.com', 10, 'Deposit Reject', 'minus', 'UMQpH8nWFxMP', '2023-03-13 02:36:11', '2023-03-13 02:36:11'),
(241, 86, NULL, 'user@gmail.com', 0.13513513513514, 'Deposit', 'plus', '0MFBV5BF8KDK', '2023-03-13 02:45:02', '2023-03-13 02:45:02'),
(242, 86, NULL, 'user@gmail.com', 0.13513513513514, 'Deposit', 'plus', '0MFBV5BF8KDK', '2023-03-13 02:48:07', '2023-03-13 02:48:07'),
(243, 86, NULL, 'user@gmail.com', 10, 'Deposit', 'plus', 'sOaPEdN49dLm', '2023-03-13 02:55:00', '2023-03-13 02:55:00'),
(244, 86, NULL, 'user@gmail.com', 10, 'Deposit', 'plus', 'p0PI721ia53M', '2023-03-13 02:57:47', '2023-03-13 02:57:47'),
(245, 86, NULL, 'user@gmail.com', 10, 'Deposit', 'plus', 'F7GMGBHHaqi5', '2023-03-13 02:58:17', '2023-03-13 02:58:17'),
(246, 86, NULL, 'user@gmail.com', 5, 'Referral Bonus', 'plus', '2LoKg3HdZPRN', '2023-09-06 23:46:43', '2023-09-06 23:46:43'),
(247, 107, NULL, 'userss@gmail.com', 5, 'Referral Bonus', 'plus', 'bSva98L5w0Gf', '2023-09-06 23:46:43', '2023-09-06 23:46:43'),
(248, 86, NULL, 'user@gmail.com', 1000, 'Deposit', 'plus', 'DunlAqDl0KTH', '2023-09-06 23:51:33', '2023-09-06 23:51:33'),
(249, 86, NULL, 'user@gmail.com', 104, 'Payout', 'minus', 'r9vI7N8NbM9w', '2023-09-06 23:53:08', '2023-09-06 23:53:08'),
(250, 86, NULL, 'user@gmail.com', 104, 'Payout Rejected', 'plus', 'DTJ1e83Ee3xB', '2023-09-06 23:53:47', '2023-09-06 23:53:47'),
(251, 86, NULL, 'user@gmail.com', 199, 'Subscription', 'minus', 'tpMW1695017331', '2023-09-18 19:08:53', '2023-09-18 19:08:53'),
(252, 86, NULL, 'user@gmail.com', 10, 'Deposit', 'plus', 'GRmPgNdrze86', '2023-09-25 06:34:11', '2023-09-25 06:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `zip` varchar(191) DEFAULT NULL,
  `skype_name` varchar(100) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_provider` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 === user\r\n2 == agent',
  `verification_link` text DEFAULT NULL,
  `email_verified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `balance` double NOT NULL DEFAULT 0,
  `interest_balance` double NOT NULL DEFAULT 0,
  `affilate_code` text DEFAULT NULL,
  `referral_id` tinyint(1) NOT NULL DEFAULT 0,
  `twofa` tinyint(4) NOT NULL DEFAULT 0,
  `go` varchar(255) DEFAULT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `details` text DEFAULT NULL,
  `kyc_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 == ''pending''\r\n1 == ''approve''\r\n2 == ''rejected''\r\n3 == ''submitted''',
  `kyc_info` longtext DEFAULT NULL,
  `kyc_reject_reason` text DEFAULT NULL,
  `is_banned` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 === banned\r\n0 === active',
  `ad_limit` int(11) DEFAULT 0,
  `is_agent` tinyint(4) NOT NULL DEFAULT 0,
  `plan_end_date` timestamp NULL DEFAULT NULL,
  `fb_link` varchar(100) DEFAULT NULL,
  `twitter_link` varchar(100) DEFAULT NULL,
  `instagram_link` varchar(100) DEFAULT NULL,
  `linkedin_link` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `plan_id`, `country_id`, `name`, `username`, `photo`, `zip`, `skype_name`, `city`, `address`, `about`, `phone`, `fax`, `email`, `password`, `remember_token`, `is_provider`, `status`, `verification_link`, `email_verified`, `balance`, `interest_balance`, `affilate_code`, `referral_id`, `twofa`, `go`, `verified`, `details`, `kyc_status`, `kyc_info`, `kyc_reject_reason`, `is_banned`, `ad_limit`, `is_agent`, `plan_end_date`, `fb_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(86, 4, 19, 'Charles Ghume', 'santiago', '1693997764svg.png', '1230', 'leo69', 'Dhaka', 'kamarapara, dhaka', NULL, '0123456789', '0900000', 'user@gmail.com', '$2y$10$1rZzlMDGGNuV98aOl5WLYOkoztE/2pdbnKa/HzAodEj/hfCgEeJYK', 'B7soIYKvWYmFO9ZYOmdGmaCZ0sscEWPVjeq959dVZVhKNYO3wA6DdBbCQaeV', 0, 2, '759f1706acfd7bc23f6b95ae35d0fd8e', 'Yes', 9332.5002702702, 11.8, '3266dcfa238c067719a09f1eabc4e1b4', 0, 0, NULL, 1, NULL, 2, '{\"full_name\":[\"Dark Loard\",\"text\"],\"nid\":[\"sSHjM9SA1649656607.jpg\",\"file\"],\"present_address\":[\"road-04\",\"textarea\"],\"parmanent_address\":[\"d\",\"textarea\"]}', NULL, 0, 3, 2, '2023-10-11 12:32:47', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://linkedin.com/', '2022-09-25 08:05:21', '2023-09-25 06:34:11'),
(99, NULL, NULL, 'Dark Loard', 'santiagoooo', NULL, NULL, NULL, NULL, NULL, NULL, '0123456789', NULL, 'ahmmedafzal4@gmail.com', '$2y$10$hcZAU3hrIQRSawiYEVDl7.vf/HWQuvWA8WkPQI9gvLA/RS.25KowS', NULL, 0, 1, '688f428f4b7dd549e6259d64e98faa94', 'Yes', 35, 0, 'f73cc12f2c55e0ddefe71c17c2e8eb6e', 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-09-25 08:05:21', '2022-09-25 08:59:33'),
(102, NULL, NULL, 'Dark Loard', 'imtiaze', '1672654301user-1.jpg', NULL, NULL, NULL, NULL, NULL, '0123456789', NULL, 'rifatbhairab4@gmail.com', '$2y$10$rGuMQNjsVmg1fkugU7dU6ebdQzhxx1gQOomJXSKwM1/vAgQsq1e7C', NULL, 0, 1, '4c11da89e999451077939a9d26e852d8', 'Yes', 40, 1400, 'c965d75b6ad90216bfc07c6ffb995215', 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-12-22 09:02:30', '2023-02-01 09:04:28'),
(104, NULL, NULL, 'Farhad Hossian', 'farhad', NULL, NULL, NULL, NULL, NULL, NULL, '0123456789', NULL, 'farhad@gmail.com', '$2y$10$vEiwR5vebrwdOigojLpW8uOL38GL0Hw3FH5vkRtXZVxADdwXvrGpC', NULL, 0, 0, '997e9cbbe2ef740f76997fd841caba2c', 'Yes', 500, 0, '9da22c4a94a7d94934e841238557b79f', 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, '2022-12-27 05:09:57', '2023-03-12 01:57:04'),
(105, NULL, NULL, 'pronob sarkar', 'pronob', NULL, NULL, NULL, NULL, NULL, NULL, '0123456789', NULL, 'pronob@gmail.com', '$2y$10$Q1b3HfYzW8Mu8sZ03vRy7ezm3g88w./V.0Pnh8s.cLIRzzZ7uVMFy', NULL, 0, 0, 'eff1ae384f40d3d036fa9cf1ad46f07f', 'Yes', 0, 0, '8fd0939e8e07e291409c35116465386c', 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-01-02 04:46:31', '2023-01-02 04:46:31'),
(106, 1, NULL, 'Farhad Hossian', 'farhad12', '1675335752user-3.jpg', NULL, NULL, NULL, NULL, NULL, '123456', NULL, 'farhad12@gmail.com', '$2y$10$u1X1ItV5JJBmkOGo0sGAHORyoEf.tVVgy9Z.omMB0X5u5xoXp/N0i', NULL, 0, 2, 'dc78d880674b653ab7b400dea4249f3f', 'Yes', 0, 0, '32afb1fe67b9d00d482b2e653314a9a7', 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 5, 2, '2023-05-06 22:09:58', NULL, NULL, NULL, NULL, '2023-02-01 11:21:10', '2023-02-02 11:27:09'),
(107, NULL, NULL, 'Tatiana Rivas', 'Titana', NULL, NULL, NULL, NULL, NULL, NULL, '01779002301', NULL, 'userss@gmail.com', '$2y$10$AsRurfZN3vbd1kX9/bxRJuzQfGYAM97AwD0uN0MUZ1X5b0jhjLFuK', NULL, 0, 1, 'f661c0982ffe6d55df2e4e05723402df', 'Yes', 5, 0, '77acf30154573994ae8b7a6ecfb913a3', 86, 0, NULL, 0, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2023-09-06 23:46:43', '2023-09-06 23:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `withdraw_id` int(11) NOT NULL DEFAULT 0,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('Invest','Payout','Withdraw') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL,
  `subscription_number` varchar(255) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `subscription_number`, `txnid`, `user_id`, `plan_id`, `currency_id`, `price`, `method`, `days`, `status`, `created_at`, `updated_at`) VALUES
(57, 'yaXD1669527650', '7DA323986A523141D', 86, 1, 1, 10, 'paypal', 7, 1, '2022-11-27 05:40:50', '2022-11-27 05:41:04'),
(58, 'L7U41669527723', 'txn_3M8dcvJlIV5dN9n70oMAf4kJ', 86, 2, 1, 20, 'stripe', 5, 0, '2022-11-27 05:42:06', '2022-11-27 05:42:06'),
(59, '59MS1669528493', '20221127111212800110168495804270561', 86, 4, 9, 30, 'paytm', 6, 1, '2022-11-27 05:54:53', '2022-11-27 05:58:23'),
(60, '1Y891669528722', 'order_KkxKeX0fn8aw2l', 86, 5, 9, 40, 'razorpay', 1, 1, '2022-11-27 05:59:42', '2022-11-27 05:59:42'),
(61, 'PBsF1669528842', NULL, 86, 6, 1, 50, 'authorize.net', 5, 0, '2022-11-27 06:00:44', '2022-11-27 06:00:44'),
(62, '8CrR1669528933', '3980846', 86, 7, 1, 60, 'flutterwave', 9, 1, '2022-11-27 06:02:13', '2022-11-27 06:03:33'),
(63, 'PrDA1669529630', NULL, 86, 8, 1, 70, 'flutterwave', 10, 0, '2022-11-27 06:13:50', '2022-11-27 06:13:50'),
(64, 'pnGI1669529677', '3980860', 86, 8, 1, 70, 'flutterwave', 10, 1, '2022-11-27 06:14:37', '2022-11-27 06:15:13'),
(65, 'I6ty1669633809', 'txn_3M95E0JlIV5dN9n70QejmaL9', 86, 2, 1, 20, 'stripe', 5, 0, '2022-11-28 11:10:12', '2022-11-28 11:10:12'),
(66, 'u1pm1671440824', 'txn_3MGfJOJlIV5dN9n71RO2Oozu', 86, 4, 1, 199, 'stripe', 90, 0, '2022-12-19 09:07:07', '2022-12-19 09:07:07'),
(67, 'HvuU1671699111', '9C7745535N314643R', 86, 2, 1, 99, 'paypal', 90, 1, '2022-12-22 08:51:51', '2022-12-22 08:52:19'),
(68, 'Ws1c1675310995', 'txn_3MWu7VJlIV5dN9n71Dvg5Aty', 106, 1, 1, 49, 'stripe', 90, 0, '2023-02-02 04:09:58', '2023-02-02 04:09:58'),
(69, '7Bjl1675337227', 'txn_3MX0waJlIV5dN9n71rtj1AUk', 106, 1, 1, 49, 'stripe', 90, 0, '2023-02-02 11:27:09', '2023-02-02 11:27:09'),
(70, 'tpMW1695017331', 'txn_3NradcJlIV5dN9n71pbr7WRw', 86, 4, 1, 199, 'stripe', 90, 0, '2023-09-18 19:08:53', '2023-09-18 19:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(4, 86, 16, '2022-12-29 10:20:18', '2022-12-29 10:20:18'),
(5, 86, 16, '2023-01-17 05:01:13', '2023-01-17 05:01:13'),
(6, 102, 10, '2023-01-26 06:33:04', '2023-01-26 06:33:04'),
(14, 86, 10, '2023-07-05 10:56:56', '2023-07-05 10:56:56'),
(22, 106, 12, '2023-07-16 06:11:12', '2023-07-16 06:11:12'),
(23, 86, 13, '2023-09-25 09:16:19', '2023-09-25 09:16:19'),
(24, 86, 12, '2023-09-25 09:16:48', '2023-09-25 09:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `fee` float DEFAULT 0,
  `details` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','completed','rejected') NOT NULL DEFAULT 'pending',
  `type` enum('user','vendor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `currency_id`, `txnid`, `user_id`, `method`, `address`, `reference`, `amount`, `fee`, `details`, `created_at`, `updated_at`, `status`, `type`) VALUES
(42, 4, 'pixcXk7jGb93', 86, 'Nagad', NULL, NULL, 12.0589, 0.198971, NULL, '2023-01-03 12:35:17', '2023-01-03 12:35:17', 'pending', 'user'),
(43, 4, 'PAx7eSsGmbkR', 86, 'Nagad', NULL, NULL, 0.602944, 0.0271325, NULL, '2023-01-31 17:23:56', '2023-01-31 17:23:56', 'pending', 'user'),
(44, 9, 'SW1IYMMDMZNE', 86, 'Razorpay', NULL, NULL, 1.35135, 0.0675676, NULL, '2023-02-01 09:39:28', '2023-02-01 09:39:28', 'pending', 'user'),
(45, 1, 'YA34sf5UyOev', 86, 'Payoneer', NULL, NULL, 30, 2.45, NULL, '2023-02-01 09:40:16', '2023-02-01 09:40:16', 'pending', 'user'),
(46, 1, 'r9vI7N8NbM9w', 86, 'Stripe', NULL, NULL, 100, 4, 'ghdfgdf', '2023-09-06 16:53:08', '2023-09-06 16:53:47', 'rejected', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `min_amount` double DEFAULT NULL,
  `max_amount` double DEFAULT NULL,
  `fixed` double DEFAULT 0,
  `percentage` double DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `currency_id`, `name`, `photo`, `min_amount`, `max_amount`, `fixed`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 'Stripe', 'ynURlvhD1672726917.png', 50, 500, 2, 2, 1, '2022-03-28 08:32:17', '2023-01-03 06:21:57'),
(9, 9, 'Razorpay', '0D76Kxp91648456603.jpg', 100, 300, 3, 2, 1, '2022-03-28 08:36:43', '2022-03-28 09:22:56'),
(10, 1, 'Payoneer', 'rn9vTcJN1648456648.jpg', 30, 150, 2, 1.5, 1, '2022-03-28 08:37:28', '2022-03-28 09:22:42'),
(11, 4, 'Nagad', 'xVE3LFPN1672726891.jpg', 50, 100, 1.5, 1.5, 1, '2022-03-28 08:38:12', '2023-01-03 09:28:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_languages`
--
ALTER TABLE `admin_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_conversations`
--
ALTER TABLE `admin_user_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_messages`
--
ALTER TABLE `admin_user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_rents`
--
ALTER TABLE `buy_rents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`),
  ADD UNIQUE KEY `countries_iso2_unique` (`iso2`),
  ADD UNIQUE KEY `countries_iso3_unique` (`iso3`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_forms`
--
ALTER TABLE `dynamic_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor_plans`
--
ALTER TABLE `floor_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invests`
--
ALTER TABLE `invests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagesettings`
--
ALTER TABLE `pagesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_enquiries`
--
ALTER TABLE `property_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_reviews`
--
ALTER TABLE `property_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_bonuses`
--
ALTER TABLE `referral_bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seotools`
--
ALTER TABLE `seotools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialsettings`
--
ALTER TABLE `socialsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_languages`
--
ALTER TABLE `admin_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin_user_conversations`
--
ALTER TABLE `admin_user_conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admin_user_messages`
--
ALTER TABLE `admin_user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attribute_options`
--
ALTER TABLE `attribute_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buy_rents`
--
ALTER TABLE `buy_rents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `dynamic_forms`
--
ALTER TABLE `dynamic_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `floor_plans`
--
ALTER TABLE `floor_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invests`
--
ALTER TABLE `invests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pagesettings`
--
ALTER TABLE `pagesettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `property_enquiries`
--
ALTER TABLE `property_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `referral_bonuses`
--
ALTER TABLE `referral_bonuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seotools`
--
ALTER TABLE `seotools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socialsettings`
--
ALTER TABLE `socialsettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
