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
                    'title' => 'Other Fee',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Search Other Fee',
                            'page' => 'other_fee'
                        ],
                        [
                            'title' => 'Add Other Fee',
                            'page' => 'other_fee_create'
                        ],
                        [
                            'title' => 'Trashed',
                            'page' => 'other_fee/trashed'
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
							'title' => 'Enroll Student',
							'page' => 'enroll_student'
						],
                        [
							'title' => 'Search Students',
							'page' => 'students'
						],
						[
							'title' => 'Withdrawed Student',
							'page' => 'withdraw_students'
                        ],
                        [
							'title' => 'Student promotion',
							'page' => 'student_promotion'
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
                            'title' => 'Category Amount',
                            'bullet' => 'dot',
                            'submenu' => [
                                [
                                    'title' => 'Category Amount',
                                    'page' => 'fee_categories_amount'
                                ],
                                [
                                    'title' => 'create Category Amount',
                                    'page' => 'fee_amount_create'
                                ],
                                [
                                    'title' => 'Trashed',
                                    'page' => 'amount/trashed'
                                ]
                                
                            ]
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

                        [
							'title' => 'Fee Management',
							'bullet' => 'dot',
							'submenu' => [
								[
									'title' => 'Register Fee',
									'page' => 'student_reg_fee_view',
								],
								[
									'title' => 'monthly Fee',
									'page' => 'student_monthly_fee_view',
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
							'page' => 'accounts',
						],
						[
							'title' => 'Trashed',
							'page' => '',
						],
					],
                ],
                [
                    'title' => 'Student Accounts',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'student fee',
                            'page' => 'student_fee',
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
					'page' => 'hire_employ',
                ],
				[
					'title' => 'Search Employees',
					'page' => 'employee',
				],
				[
                    'title' => 'Resigne Request',
					'page' => 'resigneRequest',
                ],
                [
                    'title' => 'Search Resigne Employee',
					'page' => 'resigneEmployee',
                ],
				[
                    'title' => 'Fired Employees',
					'page' => 'terminateEmployee',
                ],
                [
                    'title' => 'Trashed Employee',
                    'page' => 'employee/trashed'
                ]
            
            ]
        ],
		
		// General
        [
            'section' => 'General',
        ],
        
    ],

    
];
