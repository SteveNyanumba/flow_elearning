<p align="center"><a href="https://stevenyaumba.com" target="_blank"><img src="/flow-logo.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Flow

Flow is a remote learning tool created on the back of Laravel PHP with the aim of providing a platform to enhance learning by giving provisions for both mobile learning and physical learning at the same time. 

## The Concept

The proposed function of the system will be as follows: 
- There will be three types of users in this system; The Administrators, Students and Lecturers. 
- From the administrator’s level, there will be one superior administrator that exists from the very beginning of the lifecycle of the system. This therefore allows for the disabling of self-registration into the system.
The super administrator therefore creates the other administrators and assigns to them permissions. The superior administrator is the only one that can create, edit or delete the other administrators. All administrators will be able to create, edit or delete lecturers and students in the system as well as create units, assign lecturers to those units based on an internal timetabling system, and control all the permissions that the lecturers and the students have within the system.
- For Lecturers, they can post content to the unit’s section that they have been assigned. This therefore authorizes for content to be posted into a course section only intended by the one person teaching the course. They are also given RTMP links and stream keys so as to carry out a live stream of the class session from within the class or from wherever they may be.
- Students are the main consumers of the system and therefore they are the ones who experience the fullness of the systems automation. Administrators are the only ones that register a new student into the system. For as long as the student has been registered for a particular unit that has been offered at a particular time, they can enter the unit’s coursework section without having to undergo another enrollment for that unit. They will be able to access the class recordings from the livestreams which will be done automatically as long as the lecturer simply livestreams the class. This is so that if the student misses the class, they are able to catch up through the recordings.
- The student’s enrollment to do a unit is done manually in the system and the calculation of whether they are ready to do the unit is done in the backend, that is, whether there is a clash in the timetable, whether the student meets the prerequisites or whether they have any exceeding pending units that are prerequisites.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
