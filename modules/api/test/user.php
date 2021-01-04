     <?php
    return [
        'user' => [
            
            'login' => [
                'LoginForm[username]' => 'harman',
                'LoginForm[password]' => 'admin',
                'LoginForm[device_token]' => '12131313',
                'LoginForm[device_type]' => '1',
                'LoginForm[device_name]' => '1'
            ],
            
            'check' => [
                'DeviceDetail[device_token]' => 'harman',
                'DeviceDetail[device_type]' => 'admin',
                'DeviceDetail[device_name]' => '12131313'
            
            ],
            'signup-student' => [
                'User[full_name]' => 'Test String',
                'User[email]' => 'Trand' . rand(0, 499) . 'est@' . rand(0, 499) . 'String.com',
                'User[password]' => 'Test String',
                'User[contact_no]' => 'Test String',
                'User[trial_category_id]' => 'Test String',
                'User[trial_timing_id]' => 'Test String',
                'User[hear_from]' => 'Test String'
            
            ],
            'change-password' => [
                'User[oldPassword]' => 'Test String',
                'User[newPassword]' => 'Test String',
                'User[confirm_password]' => 'Test String'
            
            ],
            'instagram' => [
                "User[email]" => "",
                "User[userId]" => "",
                "User[provider]" => "",
                "User[full_name]" => "",
                // "User[image_url]"=>'',
                "User[device_token]" => '',
                "User[device_type]" => ''
            ]
        ]
    
    ];
    ?>
