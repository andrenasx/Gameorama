# PA: Product and Presentation

Gameorama is a web application that provides a place for gamers to post, discuss and rate the latest news on their favorite videogames and topics.



## A9: Product

The goal of this artefact is to showcase the finished product, analyzing its input validation, accessibility, usage and implementation details. It also contains an installation guide to run the project image locally.

Our product, Gameorama, consists of a platform for the gaming community to post, rate, and comment on the latest news, while also being able to follow their favorite videogame topics.



### 1. Installation

Link to the release with the final version of the source code in the group's git repository:  https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133

To run the project image locally, simply run the following commands:

```bash
# Get the required modules
composer install

# Install Pusher
composer require pusher/pusher-php-server

# Build the image
docker build -t lbaw2133/lbaw2133

#Run the image
docker run -it -p 8000:80 -e DB_DATABASE="lbaw2133" -e DB_USERNAME="lbaw2133" -e DB_PASSWORD="XO942770" lbaw2133/lbaw2133
```

**Note**: The Recover password feature is only working locally due to a problem with SSL certificates.



### 2. Usage

URL to the product: http://lbaw2133.lbaw-prod.fe.up.pt

#### 2.1. Administration Credentials

Administration URL: http://lbaw2133.lbaw-prod.fe.up.pt/admin

| Username | Password     |
| -------- | ------------ |
| WanWan   | #Password123 |

#### 2.2. User Credentials

| Username              | Password     |
| --------------------- | ------------ |
| ewyche13@google.co.uk | #Password123 |



### 3. Application Help

Help has been implemented across various features in the website:

- When an unauthenticated user tries to use a member feature (e.g. voting on news posts, following members/topics, etc.) a pop-up message appears, indicating that the user must login to execute that action;
- When a member reports someone or edits their account settings, a confirmation message appears, indicating that the action has been successful or unsuccessful depending on if it has been executed correctly or not;
- This same confirmation message appears when an admin deletes or dismisses a post/comment/topic/member report;
- Most buttons have visual indicators that represent their respective actions (e.g. the follow button changes color and text when a member is already following that topic/member);
- Finally, there is also some contextual help, which is present in the news post creation page (some tooltips for clarification) and in the sign up page (indicating the requirements for the password). 



### 4. Input Validation

Input was validated both on the client side and server side:

- On the **client side**, it is meant to provide intuitive and visual feedback to the user about the correctness and adequacy of the inserted data.
- On the **server side**, the goal is to ensure the requests are valid and are not meant to cause exploitation of any kind.

Some examples of this can be found while logging in/signing up, creating/editing a news post, updating the user's account settings and editing the user's profile.



### 5. Check Accessibility and Usability

The results of accessibility and usability tests can be found here:

[Accessibility](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/artefacts/pa/Checklist%20de%20Acessibilidade%20-%20SAPO%20UX.pdf) 

[Usability](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/artefacts/pa/Checklist%20de%20Usabilidade%20-%20SAPO%20UX.pdf) 



### 6. HTML & CSS Validation

The results of the validation of the HTML and CSS can be found here:

[HTML Home Page](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/artefacts/pa/html_report_home.pdf)

[HTML Post Page](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/artefacts/pa/html_report_post.pdf) 

[CSS](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/artefacts/pa/Validation%20-%20CSS.pdf)



### 7. Revisions to the Project

Since the requirements specification stage, several changes have been made to the project:

- **ER** - Added some missing user stories and a new one - Recover Password (US25).
- **EBD** - Made some adjustments to the UML, deleted some tables (member_image, follow_notification, comment_notification and reply notification) and added new ones (notifications and password_resets) to support password recovery and the new notifications (Laravel library). Added new triggers to support the search function and deleted the ones related to the old notification system. Also fixed other indexes/triggers.
- **EAP** - Deleted some endpoints related to the old notification system and added new ones.



### 8. Implementation Details

#### 8.1. Libraries Used

This section contains all the libraries used in the project.

##### Pusher

This library was used in order to have real-time notifications. Example: [notifications.js](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/public/js/notifications.js)

##### Select2

This library makes the topic selection possible while creating or editing a news post. Example: [create_post.js](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/public/js/create_post.js) and [create_post.blade.php](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/resources/views/pages/create_post.blade.php)

##### TinyMCE

TinyMCE is an advanced WYSIWYG HTML editor used to write content while creating or editing a news post. Example: [create_post.js](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/public/js/create_post.js) and [create_post.blade.php](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/resources/views/pages/create_post.blade.php)

##### Gmail SMTP Server

The Gmail SMTP Server provides a password recovery system, sending a verification email to the user. Example: [ForgotPasswordController.php](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/app/Http/Controllers/Auth/ForgotPasswordController.php)



#### 8.2 User Stories

The following table includes the implementation status of each user story.

| US Identifier | Name    | Module | Priority                       | Team Members               | State  |
| ------------- | ------- | ------ | ------------------------------ | -------------------------- | ------ |
|  US101     | Main Page News | Module 2 | High/Mandatory | **André Nascimento**, Gustavo Sena |  100%  |
|  US102     | Profile Page | Module 1 | High/Mandatory | **André Nascimento**, Diogo Almeida, Gustavo Sena | 100%  |
|  US103     | View Member's Posted News Posts | Module 1 | High/Mandatory | **André Nascimento** | 100%  |
| US104 | View Member's Comments          | Module 1 | High/Mandatory | **André Nascimento** | 100%  |
| US105 | View Member's Followed Members | Module 1 | High/Mandatory | **André Nascimento**, Diogo Almeida | 100% |
| US106 | View Member's Followers | Module 1 | High/Mandatory | **André Nascimento**, Diogo Almeida | 100% |
| US107 | View Member's Followed Topics | Module 1 | High/Mandatory | **André Nascimento**, Diogo Almeida | 100% |
| US108 | Search | Module 6 | High/Mandatory | **André Nascimento**, Caio Nogueira, Gustavo Sena | 100% |
| US109 | Topic Page | Module 4 | High/Mandatory | **Caio Nogueira**, André Nascimento, Gustavo Sena | 100% |
| US110 | News Post Page | Module 2 | High/Mandatory | **Diogo Almeida**, Gustavo Sena | 100% |
| US111 | Main Page Trending Topics | Module 4 | Medium/Important | **André Nascimento** | 100% |
| US112 | Main Page Hall of Fame | Module 2 | Medium/Important | **André Nascimento** | 100% |
| US113 | About Page | Module 7 | Low/Optional | **Diogo Almeida**, Caio Nogueira | 100% |
| US21 | Sign Up | Module 1 | High/Mandatory | **Caio Nogueira**, Diogo Almeida | 100% |
| US22 | Log In | Module 1 | High/Mandatory | **Caio Nogueira**, Diogo Almeida | 100% |
| US25 | Recover Password | Module 1 | Medium/Important | **André Nascimento** | 100% |
| US311 | Logout | Module 1 | High/Mandatory | **Caio Nogueira** | 100% |
| US321 | Create a News Post | Module 2 | High/Mandatory | **André Nascimento** | 100% |
| US322 | Select/Add a Topic | Module 2 | High/Mandatory | **André Nascimento** | 100% |
| US323 | Create a Topic | Module 4 | High/Mandatory | **André Nascimento** | 100% |
| US324 | Comment a News Post | Module 3 | High/Mandatory | **Caio Nogueira**, Gustavo Sena | 100% |
| US331 | Follow a Topic | Module 4 | High/Mandatory | **Diogo Almeida**, André Nascimento | 100% |
| US332 | Unfollow a Topic | Module 4 | High/Mandatory | **Diogo Almeida**, André Nascimento | 100% |
| US333 | Follow a Member | Module 2 | High/Mandatory | **Diogo Almeida** | 100% |
| US334 | Unfollow a Member | Module 2 | High/Mandatory | **Diogo Almeida** | 100% |
| US341 | Rate a News Post | Module 2 | High/Mandatory | **Caio Nogueira**, Diogo Almeida, André Nascimento | 100% |
| US342 | Rate a Comment | Module 2 | High/Mandatory | **Caio Nogueira**, Diogo Almeida, André Nascimento | 100% |
| US343 | Report a Member | Module 2 | High/Mandatory | **Gustavo Sena** | 100% |
| US344 | Report a News Post | Module 2 | High/Mandatory | **Gustavo Sena** | 100% |
| US345 | Report a Comment | Module 3 | High/Mandatory | **Gustavo Sena** | 100% |
| US346 | Report a Topic | Module 4 | High/Mandatory | **Gustavo Sena** | 100% |
| US347 | Bookmark a News Post | Module 2 | High/Mandatory | **Diogo Almeida** | 100% |
| US348 | Remove Bookmarked a News Post | Module 2 | High/Mandatory | **Diogo Almeida** | 100% |
| US351 | View Bookmarked News Posts | Module 2 | High/Mandatory | **André Nascimento** | 100% |
| US352 | Edit Profile Information | Module 2 | High/Mandatory | **Caio Nogueira** | 100% |
| US353 | Edit Account Settings | Module 2 | High/Mandatory | **André Nascimento**, Diogo Almeida | 100% |
| US354 | Delete Account | Module 2 | High/Mandatory | **André Nascimento** | 100% |
| US361 | Notifications | Module 5 | Medium/Important | **Diogo Almeida** | 100% |
| US41 | Edit my News Post | Module 2 | High/Mandatory | **André Nascimento** | 100% |
| US42 | Delete my News Post | Module 2 | High/Mandatory | **André Nascimento** | 100% |
| US51 | Edit my Comment | Module 3 | High/Mandatory | **Caio Nogueira** | 100% |
| US52 | Delete my Comment | Module 3 | High/Mandatory | **Caio Nogueira** | 100% |
| US61 | Delete a News Post | Module 7 | High/Mandatory | **Caio Nogueira** | 100% |
| US62 | Delete a Comment | Module 7 | High/Mandatory | **Caio Nogueira** | 100% |
| US63 | Delete/Ban an account | Module 7 | High/Mandatory | **Caio Nogueira** | 100% |
| US64 | Delete a Topic | Module 7 | High/Mandatory | **Caio Nogueira** | 100% |
| US65 | View Administrator Page | Module 7 | High/Mandatory | **Caio Nogueira** | 100% |

<div style="page-break-after: always; break-after: page;"></div>


## A10: Presentation



### 1. Product presentation

Gameorama is a web application that provides a place for gamers to post, discuss and rate the latest news on their favorite videogames and topics. As the videogame world is continuously evolving, its community sometimes struggles to keep up with all the changes and new releases:  the purpose of this project is to precisely solve that problem.

The main features of the website include a main page where it is possible to sort by popularity or recent news. Authenticated users also have the option to see a customized feed with the news posts of members or topics they follow. It is also possible to create news posts and associate them with a specific topic, making it easier for other users to find it and comment on it, both features being essential to the main functionality of the website. Another important feature is the possibility of upvoting or downvoting posts or comments, which has a direct impact on the author's "aura" score, and, consequently, their reputation on the website, since this score is supposed to represent the popularity and reliability of the member and their content.

URL to the product: http://lbaw2133.lbaw-prod.fe.up.pt  



### 2. Video presentation

Link to the lbaw2133.mp4 file: https://drive.google.com/file/d/1egkA-okxfenRqqPJ9Hed_N0WY08mci_K/view?usp=sharing

![video_screenshot](https://user-images.githubusercontent.com/43822403/121538837-03a53680-c9fd-11eb-94aa-99efc8fde95f.png)

Figure 1: Video Screenshot

<div style="page-break-after: always; break-after: page;"></div>

## Revision history

Changes made to the first submission: N/A

***
GROUP2133, 10/06/2021

* André Nascimento, up201806461@fe.up.pt
* Caio Nogueira, up201806218@fe.up.pt
* Diogo Almeida (editor), up201806630@fe.up.pt
* Gustavo Sena, up201806078@fe.up.pt