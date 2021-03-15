# ER: Requirements Specification Component

Gameorama is a web application that provides a place for gamers to post, discuss and rate the latest news on their favorite videogames and topics.

## A1: Gameorama

The purpose of this project is to specify and develop an information system with a web application for a collaborative news management platform for videogames/gamers. The videogame world is continuously evolving, and its community sometimes struggles to keep up with all the changes and new releases. Gameorama solves this issue by providing a place for gamers to follow their favorite topics, genres, and games.

The goal of Gameorama is to develop a platform for the gaming community to post, rate, and comment on the latest news, while also being able to follow their favorite videogame topics.

The website's main page has the ability to sort posts by popularity and by the latest news. Authenticated users have the option to show their customized feed, which shows news from topics and users they are currently following, additionally, they can save their favorite news posts. The website also features a navbar with a search feature, which lets users easily search users, topics, and news. In this navbar, for authenticated users, there will also be a notifications icon, a button that allows them to create a news post and a profile page icon that leads them to an editable profile page, featuring a short biography, a profile picture, reputation score, the number of followers and their posted news. It is also on this profile page that the users can see their saved posts.

The application will feature a rating system for news and comments, granting authenticated users the ability to upvote or downvote them based on their reliability and usefulness. A news post/comment gets more visibility based on the value of upvotes-downvotes it gets. These ratings also directly influence the reputation score of the owner of the post/comment, so other users can know if their posted information is legitimate and reliable. Moreover, it is also possible for authenticated users to report abusive, inappropriate, or fake news/comments, so the moderator can analyze these situations and correctly deal with them.

Users will be distributed in three distinct groups: Visitors, Members, and Administrators. Upon entering the website, all users are presented with the latest news on the most popular topics and can search for news, topics, and users. Visitors (unauthenticated users) are able to register and/or login to create a new account. Members (authenticated users) can post and rate news and comments, while also being able to follow topics and other users, this makes it so the news that appears on their feed can be customized to their preferences. Finally, administrators can delete topics and posted news/comments of any user on the website, furthermore, if necessary, they can delete abusive accounts.


---



## A2: Actors and User stories

The following sections provide several details about the project, its actors and functionalities.

### 1. Actors

![Actors Diagram](https://user-images.githubusercontent.com/43822403/108871849-7a0a5e00-75f1-11eb-843b-3e7a4e5c987b.png)



| Identifier     | Description                                                  | Examples  |
| :------------- | :----------------------------------------------------------- | :-------- |
| User           | Generic user with access to public information, such as topics, news and comments. | n/a       |
| Visitor        | Unauthenticated user that can register itself (sign-up) or sign-in in the system. | n/a       |
| Member         | Authenticated user that can post news, comments and edit all of its posts and comments. Can also upvote or downvote other user's posts and comments. Has the ability to follow users and topics to have a customized news feed. | WanWan    |
| News Poster    | Authenticated user that belongs to the same location as the creator of a news item and can change/delete its existing information. | WanWan    |
| Comment Poster | Authenticated user that belongs to the same location as the creator of a comment and can change/delete its existing information. | kaka34    |
| Administrator  | Authenticated user that is responsible for the management of users, news and comments. | Admin9218 |
| API            | External APIs that can be used to register and/or authenticate into the system. | Google    |

Table 1: Actor's description.



### 2. User Stories

#### 2.1. User

| Identifier |           Name            | Priority |                         Description                          |
| :--------: | :-----------------------: | :------: | :----------------------------------------------------------: |
|    US11    |      Main Page News       |   High   | As a User, I want to access the website's main page, so that I can see the latest news about gaming. |
|    US12    |       Profile Page        |   High   | As a User, I want to consult the profile of a Member, so that I can see their biography,  profile picture, reputation score, number of followers and posted news. |
|    US13    |          Search           |   High   | As a User, I want to search for specific news posts, topics and users so that I can easily find what I'm looking for. |
|    US14    |        Topic Page         |   High   | As a User, I want to consult the page of a specific gaming topic so that I can see the latest news about that subject. |
|    US15    |      News Post Page       |   High   | As a User, I want to access the page of a specific news post so that I can see more details about that post and its comments. |
|    US16    | Main Page Trending Topics |  Medium  | As a User, I want to consult the top trending topics on the main page so that I can discover other gaming topics that are popular. |
|    US17    |        About Page         |   Low    | As a User, I want to access the About page, so that I can see a complete website's description. |

Table 2: User's user stories.

#### 2.2. Visitor

| Identifier |         Name         | Priority |                         Description                          |
| :--------: | :------------------: | :------: | :----------------------------------------------------------: |
|    US21    |       Sign Up        |   High   | As a Visitor, I want to register myself into the system, so that I can become a Member. |
|    US22    |        Log In        |   High   | As a Visitor, I want to authenticate into the system, so that I can have Member privileges. |
|    US23    | Sign Up using Google |  Medium  | As a Visitor, I want to register myself into the system using a Google account, so that I can become a Member, spending less time registering. |
|    US24    | Log In using Google  |  Medium  | As a Visitor, I want to authenticate into the system using a Google account, so that I can have Member privileges. |

Table 3: Visitor's user stories.

#### 2.3. Member

| Identifier | Name                          | Priority | Description                                                  |
| :--------- | :---------------------------- | :------- | :----------------------------------------------------------- |
| US311      | Logout                        | High     | As a Member, I want to logout from the system, so that other users are able to login in the same computer. |
| US321      | Create a News Post            | High     | As a Member, I want to create a news post for the community to read and comment, so that I can share the latest information on gaming. |
| US322      | Select/Add a Topic            | High     | As a Member, when creating a news post, I want to able to select gaming topics related to that post, so that I can associate the news information with the respective subject/theme. |
| US323      | Create a Topic                | High     | As a Member, when creating a news post, I want to able to create a new gaming topic related to that post, so that I can associate the news information with the respective subject/theme. |
| US324      | Comment a News Post           | High     | As a Member, I want to comment on a news post, so that I can discuss and share my opinion with the community. |
| US331      | Follow a Topic                | High     | As a Member, I want to follow a topic, so that I can see posts related to that topic in my customized news feed. |
| US332      | Unfollow a Topic              | High     | As a Member, I want to unfollow a topic, so that I remove posts related to that topic from my customized news feed. |
| US333      | Follow a Member               | High     | As a Member, I want to follow a member, so that I can see posts created by that member in my customized news feed. |
| US334      | Unfollow a Member             | High     | As a Member, I want to unfollow a followed member, so that I remove posts created by that member from my customized news feed. |
| US341      | Rate a News Post              | High     | As a Member, I want to upvote or downvote a news post based on my thoughts, so that I can affect the post's visibility. |
| US342      | Rate a Comment                | High     | As a Member, I want to upvote or downvote a comment based on my thoughts, so that I can affect the comment's visibility. |
| US343      | Report a News Post            | High     | As a Member, I want to be able to report an offensive/misleading news post, so that I can contribute in keeping Gameorama safe and reliable for me and other users. |
| US344      | Report a Comment              | High     | As a Member, I want to be able to report an offensive/misleading comment, so that I can contribute in keeping Gameorama safe and reliable for me and other users. |
| US345      | Bookmark a News Post          | High     | As a Member, I want to bookmark interesting news posts so that I can review them later. |
| US346      | Remove Bookmarked a News Post | High     | As a Member, I want to remove a Bookmarked news post so that I can delete them from my profile page. |
| US351      | View my Posted News Posts     | High     | As a Member, I want to be able so see in my profile page the news posts I've created so that I can easily access them. |
| US352      | View my Comments              | High     | As a Member, I want to be able so see in my profile page the comments I've posted so that I can easily access them. |
| US353      | View Bookmarked News Posts    | High     | As a Member, I want to be able so see in my profile page the news posts I've bookmarked so that I can easily access them. |
| US354      | Edit Profile Information      | High     | As a Member, I want to edit my own profile information (e.g. name, profile picture, biography), so that it can be up to date. |
| US355      | Edit Account  Settings        | High     | As a Member, I want to edit my account settings (e.g. email, password), so that I can keep my account safe. |
| US361      | Notifications                 | Medium   | As a Member, I want to get notified when another Member follows me or comments on my post so that I can know when and who followed me/commented on my post faster. |

Table 4: Member's user stories.

#### 2.4. News Poster

| Identifier |        Name         | Priority |                         Description                          |
| :--------: | :-----------------: | :------: | :----------------------------------------------------------: |
|    US41    |  Edit my News Post  |   High   | As a News Poster, I want to be able to edit my news post so that I can change its information when needed. |
|    US42    | Delete my News Post |   High   | As a News Poster, I want to be able to delete my news post so that I can remove it in case it contains misleading information. |

Table 5: News Poster's user stories.

#### 2.5. Comment Poster

| Identifier |       Name        | Priority |                         Description                          |
| :--------: | :---------------: | :------: | :----------------------------------------------------------: |
|    US51    |  Edit my Comment  |   High   | As a Comment Poster, I want to be able to edit my comment so that I can change its information when needed. |
|    US52    | Delete my Comment |   High   | As a Comment Poster, I want to be able to delete my comment so that I can remove it in case it contains misleading information or doesn't contribute to the discussion. |

Table 6: Comment Poster's user stories.

#### 2.6. Administrator

| Identifier |         Name          | Priority |                         Description                          |
| :--------: | :-------------------: | :------: | :----------------------------------------------------------: |
|    US61    |  Delete a News Post   |   High   | As an Administrator, I want to be able to delete a news post so that I can remove it in case it contains misleading information. |
|    US62    |   Delete a Comment    |   High   | As an Administrator, I want to be able to delete a comment so that I can remove it in case it contains misleading information or doesn't contribute to the discussion. |
|    US63    | Delete/Ban an account |   High   | As an Administrator, I want to be able to delete an account so that I can ban members that post offensive/misleading content on the website. |
|    US64    |    Delete a Topic     |   High   | As an Administrator, I want to be able to delete a topic so that I can remove topics that are offensive or contain misleading information. |

Table 7: Administrator's user stories.



### 3. Supplementary Requirements

#### 3.1. Business rules

| Identifier | Name                | Description                                                  |
| :--------- | :------------------ | :----------------------------------------------------------- |
| BR01       | Rating System       | A member can only upvote OR downvote a news post/comment, not both at the same time. |
| BR02       | News Aura Score     | A News Aura Score is calculated by the following formula: News Post's Number of Upvotes - News Post's Number of Downvotes. |
| BR03       | Comment Aura Score  | A Comment Aura Score is calculated by the following formula: Comment's Number of Upvotes - Comment's Number of Downvotes. |
| BR04       | Member's Aura score | A Member's Aura score is calculated according to the formula: All Member's News Aura + All Member's Comment Aura. |
| BR05       | Auto Upvote         | A newly created post always has its creator's own upvote automatically (although it can be removed later). |
| BR06       | Edited Post         | An edited post is adequately marked with an indicator (edited). |
| BR07       | Edited Comment      | An edited comment is adequately marked with an indicator (edited). |
| BR08       | News Poster         | A News Poster is identified with a special icon (A microphone) when they comment on their own post. |
| BR09       | Administrator       | An Administrator is identified with a special icon (A shield) when they post or comment in the website. |
| BR10       | New News Posts      | A News Post must always have at least 1 topic assigned to it. |
| BR11       | New Topics          | If, when creating a news post, a Member selects a topic that doesn't exist yet, a new page for that topic is created. |
| BR12       | Deleted Member      | A deleted Member has all their content on the website deleted (profile, news posts and comments). |
| BR13       | Deleted Topic       | A deleted Topic has all its content deleted (news posts and comments). |
| BR14       | Comment Date        | A Comment's date must be after its Post's date               |

#### 3.2. Technical requirements

| Identifier |      Name       |                         Description                          |
| :--------: | :-------------: | :----------------------------------------------------------: |
|    TR01    |  Availability   | The system must be available 99 percent of the time in each 24-hour period. |
|    TR02    |  Accessibility  | The system must ensure that everyone can access the pages, regardless of whether they have any handicap or not, or the Web browser they use. |
|    TR03    |    Usability    |         The system should be simple and easy to use.         |
|    TR04    |   Performance   | The system should have response times shorter than 2s to ensure the user's attention. |
|    TR05    | Web application | The system should be implemented as a Web application with dynamic pages (HTML5, JavaScript, CSS3 and PHP). |
|    TR06    |   Portability   | The server-side system should work across multiple platforms (Linux, Mac OS, etc.). |
|    TR07    |    Database     | The PostgreSQL 13.0 database management system must be used. |
|    TR08    |    Security     | The system shall protect information from unauthorized access through the use of an authentication and verification system. |
|    TR09    |   Robustness    | The system must be prepared to handle and continue operating when runtime errors occur. |
|    TR10    |   Scalability   | The system must be prepared to deal with the growth in the number of users and their actions. |
|    TR11    |     Ethics      | The system must respect the ethical principles in software development (for example, the password must be stored encrypted to ensure that only the owner knows it). |

#### 3.3. Restrictions

| Identifier |   Name   |                         Description                          |
| :--------: | :------: | :----------------------------------------------------------: |
|    C01     | Deadline | The system should be ready to be used at the beginning of the Summer, so gamers can use the website during their holidays. |


---



## A3: User Interface Prototype

This user interfaces prototype (or horizontal prototype) has the following goals:

1. Help to identify and describe the user requirements, and raise new ones;
2. Preview and empirically test the user interface of the product to be developed;
3. Enable quick and multiple iterations on the design of the user interface.

This artefact includes four elements:

1. [Overview of the interface elements and features common to all pages](#1. Interface and common features);
2. [Overview of the information system from the viewpoint of the users (sitemap)](#2. Sitemap);
3. [Identification and description of the main interactions with the system, organized as sequences of screens (wireflows)](#3. Wireflows);
4. [Overview of all the interfaces featuring their main content.](#4. Interfaces)

The interface's descriptions are presented on the end of the document.



### 1. Interface and common features

**Gameorama** is a web application based on HTML5, JavaScript, and CSS. The user interface was implemented using the [Bootstrap](http://getbootstrap.com/) framework.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| ![mainpage_common](https://user-images.githubusercontent.com/43822403/110498895-a218b780-80ef-11eb-8de3-fcdb752d6a96.png) | <img src="https://user-images.githubusercontent.com/43822403/110498903-a513a800-80ef-11eb-8983-697c1fc853fc.png" alt="mainpage_mobile_common" style="zoom: 60%;" /> |

**Figure 1:** Interface's guidelines.

1. **Page Logo**
2. **Navbar**
3. **Page Content**
4. **Footer**

In this figure some characteristics common to all pages are highlighted:

- We opted for a "net design" to have a flowing web page layout that suits various screen sizes, from desktop 19" or more, to 11" tablets, or even to 4" smartphones.

- The common links and buttons to the various pages maintain their position to deliver a consistent user experience.

- Most buttons and clickable text are highlighted in blue (with a few exceptions) when hovered while the rest of the website maintains a consistent color palette of orange, black and white.

  


### 2. Sitemap

A sitemap is a visual representation of the relationship between the different pages of a website that shows how all the information fits together.

The sitemap gives the project team an idea of how the website is going to be build by helping to clarify the information hierarchy.

![sitemap](https://user-images.githubusercontent.com/43822403/110516119-13149b00-8101-11eb-9423-e71328de583f.png)

**Figure 2:** Sitemap.



### 3. Wireflows

Wireflows are presented to represent some of the main interactions with the system using a sequence of interfaces and explaining how navigation is done between them.

![authentication](https://user-images.githubusercontent.com/43822403/110524585-7dcad400-810b-11eb-8ca2-43458c05721e.png)

**Figure 3:** Wireflow centered around user authentication.



![news_post](https://user-images.githubusercontent.com/43822403/110524796-c1bdd900-810b-11eb-8d1f-f13307c89aa8.png)

**Figure 4:** Wireflow centered around News post  interaction (posting a comment).



![post](https://user-images.githubusercontent.com/43822403/110524824-ca161400-810b-11eb-9135-9de6c5af1cb7.png)

**Figure 5:** Wireflow centered around topic/post page navigation and post creation/edition.



![profile](https://user-images.githubusercontent.com/43822403/110524827-cbdfd780-810b-11eb-9623-74f94ca2391c.png)

**Figure 6:** Wireflow centered around user profile navigation.



![administration](https://user-images.githubusercontent.com/43822403/110524831-cc786e00-810b-11eb-99d2-61600d4312a3.png)

**Figure 7:** Wireflow centered around administrator features.



![full_wireflow](https://i.imgur.com/0l24dcM.jpg)

**Figure 8:** Complete website Wireflow.



For the complete desktop and mobile wireframes/wireflows: [InVision Project](https://projects.invisionapp.com/freehand/document/yQhMUNjDT)

 

### 4. Interfaces

The following interfaces describe the main content of the web pages and their relative priority and help the project team previewing the features and behavior of the final product's different screens, both their desktop (left) and mobile (right) versions.

1. [Home Page](#UI01: Home Page)
2. [Search Page](#UI02: Search Page)
3. [Topic Page](#UI03: Topic Page)
4. [Post Page](#UI04: Post Page)
5. [Create Post Page](#UI05: Create Post)
6. [Edit Post Page](#UI06: Edit Post)
7. [User Profile Page](#UI07: User Profile)
8. [Edit Profile Page](#UI08: Edit Profile)
9. [Account Settings Page](#UI09: Account Settings)
10. [Login Page](#UI10: Login)
11. [Sign Up Page](#UI11: Sign Up)
12. [About Us Page](#UI12: About Us)
13. [Administration Area Page](#UI13: Administration Area)
14. [Error 404 Page](#UI14: Error 404 Page)

##### UI01: Home Page

Main website page where you can check the latest and hottest gaming news.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| ![mainpageso](https://user-images.githubusercontent.com/43822403/110498741-7f869e80-80ef-11eb-97e3-43de0ee9a0f3.png) | <img src="https://user-images.githubusercontent.com/43822403/110498804-8f9e7e00-80ef-11eb-8e1b-5607c518cf95.png" alt="mainpageso_mobile" style="zoom:60%;" /> |

**Figure 9:** [Home Page(Member)](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/mainpage.php),  [Home Page (Visitor)](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/logout_mainpage.php), [Home Page (Administrator)](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/admin_mainpage.php)



##### UI02: Search Page

The page where you can search posts, topics and users.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| ![search](https://user-images.githubusercontent.com/43822403/110501011-ac3bb580-80f1-11eb-96ee-29fd96416380.png) | <img src="https://user-images.githubusercontent.com/43822403/110501007-a9d95b80-80f1-11eb-9f8b-636a2809fbd9.png" alt="search_mobile" style="zoom:50%;" /> |

**Figure 10:** [Search Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/search_results.php)




##### UI03: Topic Page
A page where you can see the news related to a specific topic.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| ![topic](https://user-images.githubusercontent.com/43822403/110499151-e015db80-80ef-11eb-9398-01c9b00ba2c6.png) | <img src="https://user-images.githubusercontent.com/43822403/110499141-ddb38180-80ef-11eb-99bf-38482198d3f4.png" alt="topic_mobile" style="zoom:50%;" /> |

**Figure 11:** [Topic Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/topic.php)




##### UI04: Post Page
A page where you can see the full news post and its comments.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110507515-ffb10200-80f7-11eb-98ae-7569d91ed591.png" alt="post" style="zoom: 150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110507525-017ac580-80f8-11eb-87c0-4eb5d94966d0.png" alt="post_mobile" style="zoom:50%;" /> |

**Figure 12:** [Post Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/post.php)



##### UI05: Create Post

A page where you can create a news post.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110500758-726aaf00-80f1-11eb-8b6b-f9eb6c848245.png" alt="createpost" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110500804-7b5b8080-80f1-11eb-84a0-b8e955e457e3.png" alt="createpost_mobile" style="zoom:60%;" /> |

**Figure 13:** [Create Post Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/create_post.php)



##### UI06: Edit Post

A page where you can edit your news posts.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110500760-73034580-80f1-11eb-9a5f-4e36aade3155.png" alt="editpost" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110500808-7c8cad80-80f1-11eb-8bf9-014dc09977f7.png" alt="editpost_mobile" style="zoom:60%;" /> |

**Figure 14:** [Edit Post Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/edit_post.php)




##### UI07: User Profile
The page where you can check your created posts and comments. You can also check your bookmarked posts here.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110505110-c1b2de80-80f5-11eb-9364-2bafb201aac0.png" alt="myprofile" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110505120-c4153880-80f5-11eb-9cf0-232dbe59c36a.png" alt="myprofile_mobile" style="zoom: 67%;" /> |

**Figure 15:** [User Profile Page (Own)](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/my_profile.php), [User Profile Page (Other User)](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/profile.php)



##### UI08: Edit Profile

The page where you can edit your name, profile/banner pictures and bio.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110499950-a1ccec00-80f0-11eb-9d60-9ead279b9824.png" alt="editprofile" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110499931-9ed1fb80-80f0-11eb-987b-ca37f6f275a8.png" alt="editprofile_mobile" style="zoom:60%;" /> |

**Figure 16:** [Edit Profile Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/edit_profile.php)



##### UI09: Account Settings

The page where you can edit your email and password.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110509180-be215680-80f9-11eb-9a67-72f6930604fd.png" alt="accsettings" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110509174-bc579300-80f9-11eb-8bd6-cdcec90a02a6.png" alt="accsettings_mobile" style="zoom:60%;" /> |

**Figure 17:** [Account Settings Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/accsettings.php)



##### UI10: Login 

The page where you can login to your account.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110500360-09833700-80f1-11eb-9317-55932285382a.png" alt="login" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110500406-143dcc00-80f1-11eb-93cb-ec3a86ac0604.png" alt="login_mobile" style="zoom: 80%;" /> |

**Figure 18:** [Login Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/login.php)



##### UI11: Sign Up

The page where you can create a new account.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110500370-0be59100-80f1-11eb-9257-d3f2180461c3.png" alt="signup" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110500417-16078f80-80f1-11eb-9054-213b42472a5c.png" alt="signup_mobile" style="zoom: 75%;" /> |

**Figure 19:** [Sign Up Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/signup.php)



##### UI12: About Us

The page where you can consult the website's goals and creators.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/55626181/111075866-c86c9780-84e1-11eb-9c4f-12f9979f7c30.png" alt="about" style="zoom: 200%;" /> | <img src="https://user-images.githubusercontent.com/55626181/111075839-b5f25e00-84e1-11eb-9719-6e0a4cde4225.png" alt="about_mobile" style="zoom: 50%;" /> |

**Figure 20:** [About Us Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/about.php)



##### UI13: Administration Area

The page where admins can control and delete reported content on the website.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/43822403/110521838-2d05ac00-8108-11eb-9b88-6958aec0aaee.png" alt="admin" style="zoom:150%;" /> | <img src="https://user-images.githubusercontent.com/43822403/110500540-38011200-80f1-11eb-9f41-27d8b104ad2c.png" alt="admin_mobile" style="zoom: 67%;" /> |

**Figure 21:** [Administration Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/admin.php)



##### UI14: Error 404 Page

The page that appears when a 404 error occurs.

|                           Desktop                            |                            Mobile                            |
| :----------------------------------------------------------: | :----------------------------------------------------------: |
| <img src="https://user-images.githubusercontent.com/55626181/111075873-d15d6900-84e1-11eb-97bc-0951d6b2a6fb.png" alt="error" style="zoom:170%;" /> | <img src="https://user-images.githubusercontent.com/55626181/111075885-df12ee80-84e1-11eb-9aa4-65c776d7838b.png" alt="error_mobile" style="zoom:67%;" /> |

**Figure 22:** [Error 404 Page](http://lbaw2133-piu.lbaw-prod.fe.up.pt/pages/error.php)

---

## Revision history

Changes made to the first submission: N/A
***
GROUP2133, 14/03/2021

* André Nascimento, up201806461@fe.up.pt
* Caio Nogueira, up201806218@fe.up.pt
* Diogo Almeida (editor), up201806630@fe.up.pt
* Gustavo Sena, up201806078@fe.up.pt