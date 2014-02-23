<?php

 /**
 * Example Application

 * @package Example-application
 */
session_start(); 
require 'libs/Smarty.class.php';

$smarty = new Smarty;

if(!isset($_SESSION['jsonstring'])){
$_SESSION['jsonstring']="[
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -122,
    'positiony': 0,
    'positionz': 158,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -38,
    'positiony': 0,
    'positionz': 89,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -200,
    'positiony': 0,
    'positionz': 82,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 41,
    'positiony': 0,
    'positionz': 158,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 116,
    'positiony': 0,
    'positionz': 84,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 50,
    'positiony': 50,
    'positionz': 150,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 88,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -39.5,
    'positiony': 25,
    'positionz': 158,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -14.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -23,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -29.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 13,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 20.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 28,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 78,
    'positiony': 50,
    'positionz': 122,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 87,
    'positiony': 50,
    'positionz': 112,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 96,
    'positiony': 50,
    'positionz': 104,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 103,
    'positiony': 50,
    'positionz': 96,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 117,
    'positiony': 50,
    'positionz': 84,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -200,
    'positiony': 50,
    'positionz': 82,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 111,
    'positiony': 50,
    'positionz': 89,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 59,
    'positiony': 50,
    'positionz': 142,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 69,
    'positiony': 50,
    'positionz': 132,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -192,
    'positiony': 50,
    'positionz': 91,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -177,
    'positiony': 50,
    'positionz': 105,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -168,
    'positiony': 50,
    'positionz': 113,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -160,
    'positiony': 50,
    'positionz': 122,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -150,
    'positiony': 50,
    'positionz': 131,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -141,
    'positiony': 50,
    'positionz': 139,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -131,
    'positiony': 50,
    'positionz': 149,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -182,
    'positiony': 50,
    'positionz': 97,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 88,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -39,
    'positiony': 50,
    'positionz': 158,
    'windows': [],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 14.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 22.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 29,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -13,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -21,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -28,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -178,
    'positiony': 25,
    'positionz': 105,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -182,
    'positiony': 25,
    'positionz': 97,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -192,
    'positiony': 25,
    'positionz': 91,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -200,
    'positiony': 25,
    'positionz': 81,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 59,
    'positiony': 25,
    'positionz': 143,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 2.5,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 51,
    'positiony': 25,
    'positionz': 149,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -131,
    'positiony': 25,
    'positionz': 149,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -141,
    'positiony': 25,
    'positionz': 139,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -150,
    'positiony': 25,
    'positionz': 131,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -159,
    'positiony': 25,
    'positionz': 122,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -168,
    'positiony': 25,
    'positionz': 114,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 117,
    'positiony': 25,
    'positionz': 84,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 110,
    'positiony': 25,
    'positionz': 89,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 102,
    'positiony': 25,
    'positionz': 97,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 96,
    'positiony': 25,
    'positionz': 104,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 87,
    'positiony': 25,
    'positionz': 112,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 78,
    'positiony': 25,
    'positionz': 122,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 68,
    'positiony': 25,
    'positionz': 132,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Floor',
    'xdim': 142,
    'ydim': 9,
    'level': '1',
    'xposition': -41.5,
    'yposition': 101
  },
  {
    'name': 'Wall',
    'width': 141,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': 118,
    'positiony': 0,
    'positionz': -58,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 143,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': -201,
    'positiony': 0,
    'positionz': -59,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 163,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -40.5,
    'positiony': 0,
    'positionz': 82,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -59,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 58.5,
        'positiony': 1
      }
    ],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 23.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 16,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -14.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -21.5,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Floor',
    'xdim': 155,
    'ydim': 9,
    'level': '1',
    'xposition': -40,
    'yposition': 86
  },
  {
    'name': 'Floor',
    'xdim': 123,
    'ydim': 9,
    'level': '1',
    'xposition': -40,
    'yposition': 117.5
  },
  {
    'name': 'Floor',
    'xdim': 106,
    'ydim': 9,
    'level': '1',
    'xposition': -39.5,
    'yposition': 132.5
  },
  {
    'name': 'Floor',
    'xdim': 95,
    'ydim': 7,
    'level': '1',
    'xposition': -40.5,
    'yposition': 147.5
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -120,
    'positiony': 0,
    'positionz': 89,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 40,
    'positiony': 0,
    'positionz': 89,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 44,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 76,
    'positiony': 0,
    'positionz': 45,
    'windows': [],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 12,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Wall',
    'width': 44,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -160.5,
    'positiony': 0,
    'positionz': 44,
    'windows': [],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -12,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Floor',
    'xdim': 164,
    'ydim': 60,
    'level': 0,
    'xposition': -40.5,
    'yposition': 138
  },
  {
    'name': 'Floor',
    'xdim': 165,
    'ydim': 54,
    'level': '3',
    'xposition': -40,
    'yposition': 132
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 120,
    'positiony': 0,
    'positionz': 180,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 120,
    'positiony': 25,
    'positionz': 180,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 120,
    'positiony': 50,
    'positionz': 180,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -201,
    'positiony': 0,
    'positionz': 180,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -201,
    'positiony': 25,
    'positionz': 180,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -201,
    'positiony': 50,
    'positionz': 180,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 21,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': 38,
    'positiony': 0,
    'positionz': 61,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 22,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': -122,
    'positiony': 0,
    'positionz': 60.5,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Floor',
    'xdim': 164,
    'ydim': 52,
    'level': '2',
    'xposition': -41.5,
    'yposition': 130
  },
  {
    'name': 'Wall',
    'width': 52,
    'height': 25,
    'depth': 14,
    'y_rotation': 1,
    'positionx': -182.5,
    'positiony': 0,
    'positionz': -4,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 49,
    'height': 25,
    'depth': 15,
    'y_rotation': 1,
    'positionx': 102.5,
    'positiony': 0,
    'positionz': -4.5,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 40,
    'positiony': 0,
    'positionz': -50,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -120,
    'positiony': 0,
    'positionz': -50,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Floor',
    'xdim': 44,
    'ydim': 67,
    'level': '1',
    'xposition': -159,
    'yposition': 11
  },
  {
    'name': 'Floor',
    'xdim': 44,
    'ydim': 66,
    'level': '1',
    'xposition': 79,
    'yposition': 11
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -192,
    'positiony': 0,
    'positionz': -204,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -185,
    'positiony': 0,
    'positionz': -212,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -175,
    'positiony': 0,
    'positionz': -220,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -165,
    'positiony': 0,
    'positionz': -230,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -157,
    'positiony': 0,
    'positionz': -237,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 111,
    'positiony': 0,
    'positionz': -200,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 102,
    'positiony': 0,
    'positionz': -207,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 94,
    'positiony': 0,
    'positionz': -216,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 84,
    'positiony': 0,
    'positionz': -223,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 77,
    'positiony': 0,
    'positionz': -230,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 69,
    'positiony': 0,
    'positionz': -237,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 113,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -43.5,
    'positiony': 0,
    'positionz': -237,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -192,
    'positiony': 25,
    'positionz': -204,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -184,
    'positiony': 25,
    'positionz': -212,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -175,
    'positiony': 25,
    'positionz': -220,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -165,
    'positiony': 25,
    'positionz': -230,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 111,
    'positiony': 25,
    'positionz': -200,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 102,
    'positiony': 25,
    'positionz': -207,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 94,
    'positiony': 25,
    'positionz': -216,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 84,
    'positiony': 25,
    'positionz': -223,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': 77,
    'positiony': 25,
    'positionz': -230,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 118,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -44.5,
    'positiony': 25,
    'positionz': -237,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -17.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 25.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 48.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -44.5,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Floor',
    'xdim': 21,
    'ydim': 72,
    'level': '1',
    'xposition': 96.5,
    'yposition': -126
  },
  {
    'name': 'Floor',
    'xdim': 21,
    'ydim': 73,
    'level': '1',
    'xposition': -183.5,
    'yposition': -128
  },
  {
    'name': 'Wall',
    'width': 140,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': -201,
    'positiony': 25,
    'positionz': -61.5,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -46.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -53.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 4.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 49.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 55,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 139,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': 117,
    'positiony': 25,
    'positionz': -60,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -3.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -46,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': -52.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 48.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 54.5,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 3,
    'height': 25,
    'depth': 3,
    'y_rotation': 0,
    'positionx': -165.5,
    'positiony': 0,
    'positionz': -197.5,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 3,
    'height': 25,
    'depth': 3,
    'y_rotation': 0,
    'positionx': 79.5,
    'positiony': 0,
    'positionz': -194.5,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 77,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -40,
    'positiony': 0,
    'positionz': 44,
    'windows': [],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -32,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 15,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 7.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 19.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 25.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 31.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -12.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -18.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -25.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -5.5,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Floor',
    'xdim': 77,
    'ydim': 21,
    'level': '1',
    'xposition': -40,
    'yposition': 58.5
  },
  {
    'name': 'Wall',
    'width': 141,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': -201,
    'positiony': 50,
    'positionz': -61.5,
    'windows': [],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -53,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -3,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 50.5,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -192,
    'positiony': 50,
    'positionz': -204,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -184,
    'positiony': 50,
    'positionz': -212,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -175,
    'positiony': 50,
    'positionz': -220,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 1,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -165,
    'positiony': 50,
    'positionz': -230,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 111,
    'positiony': 50,
    'positionz': -200,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 102,
    'positiony': 50,
    'positionz': -207,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 94,
    'positiony': 50,
    'positionz': -216,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 84,
    'positiony': 50,
    'positionz': -223,
    'windows': [
      {
        'width': 10,
        'height': 10,
        'depth': 10,
        'positionx': 0,
        'positiony': 1
      }
    ],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 77,
    'positiony': 50,
    'positionz': -230,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 118,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -45,
    'positiony': 50,
    'positionz': -237,
    'windows': [],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 17.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 44.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -26,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -48.5,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Wall',
    'width': 143,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': 117,
    'positiony': 50,
    'positionz': -58.5,
    'windows': [],
    'doors': [
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': -53,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 0.5,
        'positiony': 1
      },
      {
        'width': 10,
        'height': 24,
        'depth': 10,
        'positionx': 48,
        'positiony': 1
      }
    ]
  },
  {
    'name': 'Floor',
    'xdim': 33,
    'ydim': 138,
    'level': '2',
    'xposition': 120,
    'yposition': -59
  },
  {
    'name': 'Floor',
    'xdim': 35,
    'ydim': 139,
    'level': '2',
    'xposition': -194.5,
    'yposition': -58.5
  },
  {
    'name': 'Floor',
    'xdim': 75,
    'ydim': 75,
    'level': 0,
    'xposition': -41,
    'yposition': -167
  },
  {
    'name': 'Floor',
    'xdim': 156,
    'ydim': 81,
    'level': 0,
    'xposition': -42.5,
    'yposition': -4
  },
  {
    'name': 'Floor',
    'xdim': 192,
    'ydim': 161,
    'level': '3',
    'xposition': -39,
    'yposition': -82.5
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 118,
    'positiony': 0,
    'positionz': -239,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -200,
    'positiony': 0,
    'positionz': -239,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 1,
    'positionx': -200,
    'positiony': 25,
    'positionz': -239,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -200,
    'positiony': 50,
    'positionz': -239,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 118,
    'positiony': 25,
    'positionz': -239,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 118,
    'positiony': 50,
    'positionz': -239,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -225,
    'positiony': 0,
    'positionz': -193,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -225,
    'positiony': 25,
    'positionz': -193,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -225,
    'positiony': 0,
    'positionz': 75,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': -225,
    'positiony': 25,
    'positionz': 75,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 148,
    'positiony': 0,
    'positionz': -191,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 148,
    'positiony': 25,
    'positionz': -191,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 148,
    'positiony': 0,
    'positionz': 73,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Wall',
    'width': 5,
    'height': 25,
    'depth': 5,
    'y_rotation': 0,
    'positionx': 148,
    'positiony': 25,
    'positionz': 73,
    'windows': [],
    'doors': []
  },
  {
    'name': 'Floor',
    'xdim': 75,
    'ydim': 58,
    'level': 0,
    'xposition': -40,
    'yposition': 242.5
  }
];



";}


$smarty->assign("json",stripslashes($_SESSION['jsonstring']));
//$smarty->assign("FirstName",array("John","Mary","James","Henry"));
//$smarty->assign("LastName",array("Doe","Smith","Johnson","Case"));
//$smarty->assign("Class",array(array("A","B","C","D"), array("E", "F", "G", "H"),
//      array("I", "J", "K", "L"), array("M", "N", "O", "P")));
//
//$smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "cell" => "3"),
//      array("phone" => "555-4444", "fax" => "555-3333", "cell" => "760-1234")));
//
//$smarty->assign("option_values", array("NY","NE","KS","IA","OK","TX"));
//$smarty->assign("option_output", array("New York","Nebraska","Kansas","Iowa","Oklahoma","Texas"));
//$smarty->assign("option_selected", "NE");

$smarty->display('index.tpl');

?>
