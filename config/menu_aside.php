<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'dashboard',
            'new-tab' => false,
        ],

        // Administration
        [
            'section' => 'Administration',
        ],
        [
            'title' => 'Students',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Search Students',
					'page' => 'students'
                ],
				[
                    'title' => 'Enroll Student',
					'page' => 'enroll_student'
                ],
				[
                    'title' => 'Withdraw Student',
					'page' => 'students'
                ]
            ]
        ],
		[
            'title' => 'Faculties',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Administration',
					'bullet' => 'dot',
					'submenu' => [
						[
							'title' => 'Search Admins',
							'page' => 'admins'
						]
					]
                ],
				[
                    'title' => 'Teachers',
					'bullet' => 'dot',
					'submenu' => [
						[
							'title' => 'Search Teachers',
							'page' => 'teachers'
						]
					]
                ],
				[
                    'title' => 'Domestics',
					'bullet' => 'dot',
					'submenu' => [
						[
							'title' => 'Search Workers',
							'page' => 'workers'
						]
					]
                ]
            ]
        ],
        [
            'title' => 'Academics',
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Sessions',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Search Sessions',
                            'page' => 'sessions'
                        ],
                        [
                            'title' => 'Create Session',
                            'page' => 'session'
                        ],
                        [
                            'title' => 'Delete Session',
                            'page' => 'session'
                        ],
                        [
                            'title' => 'Trashed',
                            'page' => 'trashed_sessions'
                        ]
                    ]
                ],
                [
                    'title' => 'Classes',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Search Classes',
                            'page' => 'classes'
                        ],
                        [
                            'title' => 'Add Class',
                            'page' => 'classes'
                        ],
                        [
                            'title' => 'Delete Class',
                            'page' => 'class'
                        ],
                        [
                            'title' => 'Trashed',
                            'page' => 'trashed_classes'
                        ]
                    ]
                ],
                [
                    'title' => 'Sections',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Search Sections',
                            'page' => 'sections'
                        ],
                        [
                            'title' => 'Add Section',
                            'page' => 'sections'
                        ],
                        [
                            'title' => 'Delete Section',
                            'page' => 'sections'
                        ],
                        [
                            'title' => 'Trashed',
                            'page' => 'trashed_sections'
                        ]
                    ]
                ],
                [
                    'title' => 'Subjects',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Search Subjects',
                            'page' => 'subjects'
                        ],
						[
                            'title' => 'Add Subjects',
                            'page' => 'subjects'
                        ],
						[
                            'title' => 'Delete Subjects',
                            'page' => 'subjects'
                        ],
						[
                            'title' => 'Trashed',
                            'page' => 'trashed_subjects'
                        ],
                    ]
                ]
            ]
        ]
    ]

];
