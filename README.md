# OpenSourceSWProject

## 프로젝트 설명

- 로컬에서 사용할 수 있는 커뮤니티 사이트 제작

- 유저 정보를 데이터베이스에 저장하고, 유저들이 작성한 글, 댓글 전부 데이터베이스에 저장하여 커뮤니티 구현



## 프로젝트 사용 방법

- xampp 설치 (필수) https://www.apachefriends.org/

- 운영체제에 맞는 프로그램 설치

![KakaoTalk_Photo_2024-06-13-04-11-24](https://github.com/Sumin0329/OpenSourceSWProject/assets/163393624/5be29590-a3dc-4ae2-8256-f7a98e74f0f8)



<윈도우 운영체제 사용시 Panel에서 Apache와 MySQL 사용>

![KakaoTalk_Photo_2024-06-13-04-12-20](https://github.com/Sumin0329/OpenSourceSWProject/assets/163393624/4fcf2ac0-8443-49f2-9c54-5413e09ac922) ![KakaoTalk_Photo_2024-06-13-04-12-32](https://github.com/Sumin0329/OpenSourceSWProject/assets/163393624/3ad02284-1230-430b-8089-fedf0fb977e0)


 

<MAC OS 운영체제 사용시 위 그림처럼 빨간색 네모 버튼 클릭>



xampp 폴더에 들어간 다음, htdocs 폴더로 이동, htdocs 폴더 안에서 git clone

ex) git clone https://github.com/Sumin0329/OpenSourceSWProject project 실행 시, project이름의 파일 생성



브라우저 실행 후 localhost:(포트번호(대부분 80 사용))/(htdocs파일 안에서의 경로)/mainpage.php 로 접속

ex) localhost:80/project/mainpage.php

![KakaoTalk_Photo_2024-06-13-04-12-39](https://github.com/Sumin0329/OpenSourceSWProject/assets/163393624/68cb7bbe-fb43-4e0e-9a7a-b5c6679df0fd)



 

<mainpage.php의 화면, 첫 실행 시 회원가입>



- 회원가입 후, 로그인하여 Write Post, Edit Profile 등의 기능 실행 가능

- 회원가입 직후라면 데이터베이스에 작성 된 글이 없으므로 화면에 글이 없음

- Write Post시 글 목록에 작성된 글 표시

- 댓글 기능 사용 가능



## 데이터베이스 접근 방법

- 브라우저 실행 후 localhost:(포트번호(대부분 80사용)) 으로 접속 

ex) localhost:80

![KakaoTalk_Photo_2024-06-13-04-12-45](https://github.com/Sumin0329/OpenSourceSWProject/assets/163393624/b45abde2-395d-40fb-92b1-a2019ae7dcf5)



 

<상단 navigate bar에서 phpMyAdmin 클릭>

- mainpage.php 에 접속하여 회원가입 후 로그인, 글 작성, 댓글 작성 시 memberinfodb 데이터베이스 안에 3개의 테이블 생성

- 3개의 테이블(comment, memberinfo, post)에서 데이터 확인 가능

![KakaoTalk_Photo_2024-06-13-04-15-29](https://github.com/Sumin0329/OpenSourceSWProject/assets/163393624/b2bd417c-42bb-407b-8ce8-416c02b594b9)
