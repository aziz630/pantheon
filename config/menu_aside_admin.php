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
            'title' => 'Academics',
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                
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
                            'page' => 'class_create'
                        ],
                        [
                            'title' => 'Trashed',
                            'page' => 'classes/trashed'
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
                            'page' => 'section_create'
                        ],
                        [
                            'title' => 'Trashed',
                            'page' => 'sections/trashed'
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
                            'page' => 'subject_create'
                        ],
						[
                            'title' => 'Trashed',
                            'page' => 'subjects/trashed'
                        ],
                    ]
                ],
                [
                    'title' => 'Time Tables',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Search Time Tables',
                            'page' => '#'
                        ],
						[
                            'title' => 'Create Time Table',
                            'page' => '#'
                        ],
						[
                            'title' => 'Trashed Time Tables',
                            'page' => '#'
                        ],
                    ]
                ]
            ]
        ],
        [
            'title' => 'Admissions',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
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
                            'page' => 'session_create'
                        ],
                        [
                            'title' => 'Trashed',
                            'page' => 'sessions/trashed'
                        ]
                    ]
                ],
				[
                    'title' => 'Students',
                    'bullet' => 'dot',
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
							'title' => 'Withdrawed Student',
							'page' => 'students'
						]
                    ]
                ],
                
            ]
        ],
		[
            'title' => 'Examination',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
				[
                    'title' => 'Exam Terms',
					'page' => '#',
                ],
				[
                    'title' => 'Search Exams',
					'page' => '#',
                ],
				[
					'title' => 'Create Exam',
					'page' => '#'
				],
				[
					'title' => 'Exam Papers',
					'page' => '#'
				],
            ]
        ],
		[
            'title' => 'Finance',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
				[
                    'title' => 'Fee',
                    'bullet' => 'line',
                    'submenu' => [
                        [
							'title' => 'Fee Categories',
							'bullet' => 'dot',
							'submenu' => [
								[
									'title' => 'Search Categories',
									'page' => 'fee_categories',
								],
								[
									'title' => 'Create Category',
									'page' => 'fee_category_create',
								],
								[
									'title' => 'Trashed',
									'page' => 'fee_categories/trashed',
								],
							],
						],
						[
							'title' => 'Fee Structures',
							'bullet' => 'dot',
							'submenu' => [
								[
									'title' => 'Search Structure',
									'page' => 'fee_structures',
								],
								[
									'title' => 'Create Structure',
									'page' => 'fee_structure_create',
								],
								[
									'title' => 'Trashed',
									'page' => 'fee_structures/trashed',
								],
							],
						],
						[
							'title' => 'Fee Register',
							'bullet' => 'dot',
							'submenu' => [
								[
									'title' => 'Search Register',
									'page' => 'fee_register',
								],
								[
									'title' => 'Collect Fee',
									'page' => 'collect_fee',
								],
								[
									'title' => 'Unprocessed Fee',
									'page' => 'current_month_fee_register',
								],
							],
						],
                    ]
                ],
				[
                    'title' => 'Family Accounts',
                    'bullet' => 'dot',
					'submenu' => [
						[
							'title' => 'Search Accounts',
							'page' => '',
						],
						[
							'title' => 'Make Transaction',
							'page' => '',
						],
						[
							'title' => 'Trashed',
							'page' => '',
						],
					],
                ],
            ]
        ],
		[
            'title' => 'Human Resource',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
				[
                    'title' => 'Hire an employee',
					'page' => '#',
                ],
				[
					'title' => 'Search Employees',
					'page' => '#'
				],
				[
                    'title' => 'Resigned Employees',
					'page' => '#',
                ],
				[
                    'title' => 'Fired Employees',
					'page' => '#',
                ],
            ]
        ],
		
		// General
        [
            'section' => 'General',
        ],
        
    ]

];
