<?php
// Aside menu
return [

    'items' => [
        // Employee Dashboard
        [
            'title' => 'Employee Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'emp_dashboard',
            'new-tab' => false,
        ],

        // Administration
        [
            'section' => 'Administration',
        ],
		[
            'title' => 'Resigne',
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'bullet' => 'line',
            'page' => 'resigne',
            'root' => true,
           
        ],
        [
            'title' => 'Password Reset',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            
        ],
		[
            'title' => 'Notification',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            
        ],
		
		
		// General
        [
            'section' => 'General',
        ],
        
    ]

    
];
