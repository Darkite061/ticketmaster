-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2024 a las 20:46:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticketmaster`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rock', 'Rock and roll', '/storage/imagenes/categories/categoria_1.jpg', 'ACTIVE', '2024-05-06 08:02:49', '2024-05-06 08:02:49'),
(2, 'maincra', 'maincra bedrock', '/storage/imagenes/categories/categoria_2.jpg', 'ACTIVE', '2024-05-06 08:03:08', '2024-05-06 08:03:08'),
(3, 'gpi', 'nop invitaste', '/storage/imagenes/categories/categoria_3.jpg', 'ACTIVE', '2024-05-06 08:03:21', '2024-05-06 08:03:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `places_id` bigint(20) UNSIGNED NOT NULL,
  `price_tickets` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_02_06_033326_create_categories_table', 1),
(3, '2024_02_06_033418_create_places_table', 1),
(4, '2024_02_06_033627_create_artists_table', 1),
(5, '2024_02_06_034000_create_events_table', 1),
(6, '2024_02_06_034149_create_users_table', 1),
(7, '2024_02_06_034443_create_tickets_table', 1),
(8, '2024_02_06_034610_create_purchases_table', 1),
(9, '2024_02_06_034733_create_seats_table', 1),
(10, '2024_02_06_035048_create_reviews_table', 1),
(11, '2024_02_06_035331_create_promotions_table', 1),
(12, '2024_03_03_020848_create_images_table', 1),
(13, '2024_03_26_012919_purchases_detaile', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases_detaile`
--

CREATE TABLE `purchases_detaile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `row` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `image`, `email`, `email_verified_at`, `password`, `permission`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CRISTIAN', 'RIOS', '/storage/imagenes/users/user_CRISTIAN.png', 'cristianrios061@gmail.com', '2024-05-06 01:19:35', '$2y$10$f.CF6DuauQWgH/HYTnRi9.NM6vwoy7VepNb1DyvgPvcRZa5YMqRE2', 'ADMIN', 'ACTIVE', '2024-05-06 07:19:34', '2024-05-06 07:19:34'),
(3, 'CRISTIAN', 'RIOS', '/storage/imagenes/users/user_CRISTIAN.png', 'cristianriosasdfg@gmail.com', '2024-05-06 01:19:35', 'Passw0rd', 'ADMIN', 'ACTIVE', '2024-05-06 07:19:34', '2024-05-06 07:19:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_index` (`category_id`),
  ADD KEY `events_artist_id_index` (`artist_id`),
  ADD KEY `events_places_id_index` (`places_id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_index` (`product_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotions_code_unique` (`code`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_index` (`user_id`);

--
-- Indices de la tabla `purchases_detaile`
--
ALTER TABLE `purchases_detaile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_detaile_purchase_id_index` (`purchase_id`),
  ADD KEY `purchases_detaile_event_id_index` (`event_id`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_event_id_index` (`event_id`);

--
-- Indices de la tabla `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_event_id_index` (`event_id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_event_id_index` (`event_id`),
  ADD KEY `tickets_user_id_index` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchases_detaile`
--
ALTER TABLE `purchases_detaile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `events_places_id_foreign` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `events` (`id`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `purchases_detaile`
--
ALTER TABLE `purchases_detaile`
  ADD CONSTRAINT `purchases_detaile_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `purchases_detaile_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Filtros para la tabla `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
