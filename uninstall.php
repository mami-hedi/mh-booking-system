<?php
/**
 * Désinstallation du plugin
 * Supprime toutes les données du plugin
 */

// Si uninstall n'est pas appelé par WordPress, on quitte
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

global $wpdb;

// Supprimer les tables
$tables = array(
    $wpdb->prefix . 'mh_booking_hebergements',
    $wpdb->prefix . 'mh_booking_tarifs',
    $wpdb->prefix . 'mh_booking_reservations',
    $wpdb->prefix . 'mh_booking_reservation_meta',
);

foreach ($tables as $table) {
    $wpdb->query("DROP TABLE IF EXISTS $table");
}

// Supprimer les options
$options = array(
    'mh_booking_version',
    'mh_booking_currency',
    'mh_booking_currency_position',
    'mh_booking_date_format',
    'mh_booking_time_format',
    'mh_booking_admin_email',
    'mh_booking_confirmation_page',
    'mh_booking_terms_page',
);

foreach ($options as $option) {
    delete_option($option);
}

// Supprimer les capabilities
$role = get_role('administrator');
if ($role) {
    $role->remove_cap('manage_bookings');
    $role->remove_cap('edit_bookings');
    $role->remove_cap('delete_bookings');
    $role->remove_cap('manage_hebergements');
}

// Nettoyer les tâches cron
wp_clear_scheduled_hook('mh_booking_check_expired_reservations');
wp_clear_scheduled_hook('mh_booking_send_reminders');