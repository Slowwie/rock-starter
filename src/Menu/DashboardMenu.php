<?php

namespace App\Menu;

use Rock\Core\Menu\Navigation;
use Rock\Core\Menu\NavigationItem;

class DashboardMenu extends Navigation
{
    public function configure()
    {

        $dashboardSvg = "<svg class='mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150' stroke='currentColor' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6'/></svg>";
        $profileSvg = "<svg class='mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150' stroke='currentColor' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'/></svg>";

        if ($this->isUserLoggedIn()) {
            $dashboard = new NavigationItem();
            $dashboard->setName('dashboard');
            $dashboard->setRoute('dashboard');
            $dashboard->setLabel('Dashboard');
            $dashboard->setPriority(0);
            $dashboard->setIcon($dashboardSvg);
            $this->addItem($dashboard);

            $profile = new NavigationItem();
            $profile->setName('rock_user_profile_edit');
            $profile->setRoute('rock_user_profile_edit');
            $profile->setLabel('Profile');
            $profile->setPriority(100);
            $profile->setIcon($profileSvg);

            // children of edit
            $profilChild = new NavigationItem();
            $profilChild->setName('blubber');
            $profilChild->setRoute('rock_login');
            $profilChild->setLabel('Einschreibungen');
            $profilChild->setPriority(200);
            $profilChild->setIcon($dashboardSvg);

            $profilChild2 = new NavigationItem();
            $profilChild2->setName('blubbber');
            $profilChild2->setRoute('rock_login');
            $profilChild2->setLabel('Weiterleitungen - Aktion');
            $profilChild2->setPriority(300);
            $profilChild2->setIcon($profileSvg);

            $profile->addChild($profilChild);
            $profile->addChild($profilChild2);

            $this->addItem($profile);
        }

        $this->setAlias(self::DASHBOARD_MENU);
    }

}