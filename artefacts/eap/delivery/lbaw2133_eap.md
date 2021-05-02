# EAP: Architecture Specification and Prototype

Gameorama is a web application that provides a place for gamers to post, discuss and rate the latest news on their favorite videogames and topics.



## A7: High-level architecture. Privileges. Web resources specification

This artefact aims to describe the web application's architecture, used resources and their properties. It contains references to the graphical interfaces, the format of JSON responses and the list of needed requests. Finally, it describes data operations like creation, reading, update and deletion.

This specification adheres to the OpenAPI standard using YAML.



### 1. Overview

An overview of the web application to implement is presented in this section, where the modules are identified and briefly described. The web resources associated with each module are detailed in the individual documentation of each module.

| Module                                              | Description                                                  |
| --------------------------------------------------- | ------------------------------------------------------------ |
| [**M01: Authentication and Individual Profile**]()  | Module composed of web resources associated to authentication and user profiles. Includes features such as: login/logout, password recovery and personal profile information visualization and edition. |
| [**M02: News Posts**]()                             | Module composed of web resources associated with news posts. Includes the following features: viewing posts and their comments, adding, deleting and editing posts, voting, deleting and editing votes on posts as well as reporting posts. |
| [**M03: Comments**]()                               | Module composed of web resources related to comments. Includes the following features: adding, deleting, editing and reporting comments, as well as, voting, deleting and editing votes on those comments. |
| [**M04: Topics**]()                                 | Module composed of web resources related to topics. Includes features such as: viewing, following, unfollowing and reporting topics. |
| [**M05: Notifications**]()                          | Module composed of web resources related to notifications. Includes features such as: viewing and deleting notifications. |
| [**M06: Search**]()                                 | Module composed of web resources related to website content searching. Includes features such as: searching posts, topics and users. |
| [**M07: Member Administration and Static Pages**]() | Module composed of web resources related to content management and report review. Includes the following features: reviewing content reports and deleting posts, comments, topics and members. It also contains the "About Us" static page. |



### 2. Permissions

This section defines the permissions used in the modules to establish the conditions of access to resources.

|         |               |                                                              |
| ------- | ------------- | ------------------------------------------------------------ |
| **PUB** | Public        | Unauthenticated users                                        |
| **USR** | User          | Authenticated users                                          |
| **OWN** | Owner         | Users that are owner of information (e.g. own profile, own post, own comment, ...) |
| **ADM** | Administrator | Administrators                                               |




### 3. OpenAPI Specification

OpenAPI specification in YAML format to describe the web application's web resources.

Link to the `.yaml` file in the group's repository [here](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/blob/master/artefacts/eap/a7/a7_openapi.yaml).

Link to the Swagger generated documentation [here](https://app.swaggerhub.com/apis-docs/lbaw2133/Gameorama/1.0).

```yaml
openapi: 3.0.0

info:
  version: '1.0'
  title: 'LBAW Gameorama Web API'
  description: 'Web Resources Specification (A7) for Gameorama'
  contact:
    email: 'lbaw2133@gmail.com'

servers:
  - url: http://lbaw2133.lbaw-prod.fe.up.pt/
    description: Production server

tags:
  - name: 'M01: Authentication and Individual Profile'
  - name: 'M02: Posts'
  - name: 'M03: Comments'
  - name: 'M04: Topics'
  - name: 'M05: Notifications'
  - name: 'M06: Search'
  - name: 'M07: Administrator and Static Pages'

paths:
  /login:
    get:
      operationId: R101
      summary: 'R101: Login Form'
      description: 'Provide login form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI10](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui10-login)'
    post:
      operationId: R102
      summary: 'R102: Login Action'
      description: 'Processes the login form submission. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                email:
                  type: string
                password:
                  type: string
              required:
                - email
                - password
      responses:
        '302':
          description: 'Redirect after processing the login credentials.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to previous page.'
                302Error:
                  description: 'Failed authentication. Redirect to previous page.'
  /logout:
    get:
      operationId: R103
      summary: 'R103: Logout Action'
      description: 'Logout the current authenticated used. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui01-home-page)'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /signup:
    get:
      operationId: R104
      summary: 'R104: Register Form'
      description: 'Provide new user registration form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI11](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui11-sign-up)'
        '404':
          description: 'Page not found. Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
    post:
      operationId: R105
      summary: 'R105: Register Action'
      description: 'Processes the new user registration form submission. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                name:
                  type: string
                email:
                  type: string
                username:
                  type: string
                password:
                  type: string
                confirm_password:
                  type: string
              required:
                - name
                - email
                - username
                - password
                - confirm_password
      responses:
        '302':
          description: 'Redirect after processing the new user information.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to user profile.'
                  value: '/users/{username}'
                302Failure:
                  description: 'Failed authentication. Redirect to login form.'
                  value: '/login'
  /member/{username}:
    get:
      operationId: R106
      summary: 'R106: Members Profile'
      description: 'Page that shows member information. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the member username'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI07](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui07-user-profile)'
        '404':
          description: 'Member not found. Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
  /member/{username}/edit:
    get:
      operationId: R107
      summary: 'R107: Edit Profile Form'
      description: 'Page that allows a member to update his information. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the member username'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI08](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui08-edit-profile)'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Member not found. Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
    patch:
      operationId: R108
      summary: 'R108: Edit Profile Action'
      description: 'Allows a member to edit his information. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the member username'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                name:
                  type: string
                bio:
                  type: string
              required:
                - name
                - bio
      responses:
        '302':
          description: 'Redirect member after editing profile.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Member information edited successfully. Redirects member to their profile page.'
                  value: '/user/{username}'
                302Failure:
                  description: 'Member information editing failed. Stay in edit page.'
                  value: '/user/{username}/edit'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Member not found'
  /member/{username}/settings:
    get:
      operationId: R109
      summary: 'R109: Member account settings'
      description: 'Page to edit users account. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the member username'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui09-account-settings)'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Page not found'
  /api/change_email:
    patch:
      operationId: R110
      summary: 'R110: Change members email'
      description: 'Allows a member to change its email. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                email:
                  type: string
                email_confirmation:
                  type: string
                password:
                  type: string
              required:
                - email
                - email_confirmation
                - password
      responses:
        '200':
          description: 'Updated email.'
        '403':
          description: 'Forbidden access'
  /api/change_password:
    patch:
      operationId: R111
      summary: 'R111: Change members password'
      description: 'Allows a member to change its email. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                old_password:
                  type: string
                new_password:
                  type: string
                new_password_confirmation:
                  type: string
              required:
                - old_password
                - new_password
                - new_password_confirmation
      responses:
        '200':
          description: 'Updated password.'
        '403':
          description: 'Forbidden access'
  /api/member/{username}:
    delete:
      operationId: R112
      summary: 'R112: Delete an account'
      description: 'Allows to delete a member account. Access OWN, ADM'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the member username'
          required: true
      responses:
        '302':
          description: 'Redirect member after deletion.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Member deleted successfully. Redirects member to homepage.'
                  value: '/home'
                302Failure:
                  description: 'Member deletion failed. Redirects member to homepage.'
                  value: '/home'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Member not found'
  /api/member/{username}/follow:
    post:
      operationId: R113
      summary: 'R113: Follow a member'
      description: 'Allows a member to follow another member. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the username of the member that will be followed'
          required: true
      responses:
        '200':
          description: 'Member followed successfully'
        '403':
          description: 'Forbidden Access'
        '404':
          description: 'Member not found'
    delete:
      operationId: R114
      summary: 'R114: Unfollow a member'
      description: 'Allows a member to unfollow another member. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          required: true
          description: 'Specifies the username of the member that will be unfollowed'
      responses:
        '200':
          description: 'Member unfollowed successfully'
        '403':
          description: 'Forbidden Access'
        '404':
          description: 'Member not found'
  /api/member/{username}/report:
    post:
      operationId: R115
      summary: 'R115: Report a member'
      description: 'Allows a member to report another member. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the username of the member that will be reported'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Report'
      responses:
        '200':
          description: 'Member reported successfully'
        '403':
          description: 'Forbidden Access'
        '404':
          description: 'Member not found'
  /api/member/{username}/posts/{page}:
    get:
      operationId: R116
      summary: "R116: Member's posts"
      description: "Shows member's posted news. Access: PUB"
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the username of the member'
          required: true
        - in: path
          name: page
          schema:
            type: string
          description: 'Specifies the number of the page for the query'
          required: true
      responses:
        '200':
          description: 'Ok. Shows [UI]'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/NewsPost'
        '404':
          description: 'Member not found'
  /api/member/{username}/comments/{page}:
    get:
      operationId: R117
      summary: "R117: Member's comments"
      description: "Shows member's posted comments. Access: PUB"
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the username of the member'
          required: true
        - in: path
          name: page
          schema:
            type: string
          description: 'Specifies the number of the page for the query'
          required: true
      responses:
        '200':
          description: 'Ok. Shows [UI]'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Comment'
        '404':
          description: 'Member not found'
  /api/member/{username}/bookmarked/{page}:
    get:
      operationId: R118
      summary: "R118: Member's bookmarked posts"
      description: "Shows member's bookmarked newsposts. Access: PUB"
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the username of the member'
          required: true
        - in: path
          name: page
          schema:
            type: string
          description: 'Specifies the number of the page for the query'
          required: true
      responses:
        '200':
          description: 'Ok. Shows [UI]'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/NewsPost'
        '404':
          description: 'Member not found'


  /home:
    get:
      operationId: R201
      summary: 'R201: Shows main page'
      description: 'Obtains main page Hall of Fame and Most Popular Topics. Access: PUB'
      tags:
        - 'M02: Posts'
      responses:
        '200':
          description: 'Ok. Show [UI01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui01-home-page)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found: Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
  /api/home/feed/{page}:
    post:
      operationId: R202
      summary: 'R202: Main page feed posts'
      description: "Returns member's feed posts. Access: USR"
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: page
          schema:
            type: string
          description: 'Specifies the number of the page for the query'
          required: true
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/NewsPost'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /api/home/trending/{page}:
    post:
      operationId: R203
      summary: 'R203: Main page trending posts'
      description: "Returns Gameorama's trending posts. Access: PUB"
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: page
          schema:
            type: string
          description: 'Specifies the number of the page for the query'
          required: true
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/NewsPost'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /api/home/latest/{page}:
    post:
      operationId: R204
      summary: 'R204: Main page latest posts'
      description: "Returns Gameorama's latest posts. Access: PUB"
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: page
          schema:
            type: string
          description: 'Specifies the number of the page for the query'
          required: true
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/NewsPost'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /post/create:
    get:
      operationId: R205
      summary: 'R205: Shows create post page'
      description: 'Allows member to access create post page. Access: USR'
      tags:
        - 'M02: Posts'
      responses:
        '200':
          description: 'Ok. Show [UI05](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui05-create-post)'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '302':
          description: 'Redirect visitor.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Redirect to login form'
                  value: '/login'
    post:
      operationId: R206
      summary: 'R206: Adds a news post'
      description: 'Allows a member to create a news post. Access: USR'
      tags:
        - 'M02: Posts'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/NewsPost'
      responses:
        '302':
          description: 'Redirect visitor.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Redirect to login form.'
                  value: '/login'
        '400':
          description: 'Bad Request'
  /post/{id_post}:
    get:
      operationId: R207
      summary: 'R207: Shows a news post'
      description: 'Shows a post and its comments. Access: PUB'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be displayed'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI04](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui04-post-page)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Invalid post id: Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
    delete:
      operationId: R208
      summary: 'R208: Delete a post'
      description: 'Allows a member to delete a post. Access OWN, ADM'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be deleted'
          required: true
      responses:
        '302':
          description: 'Redirect after updating the news_post content.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful edition. Redirect to previous page.'
                302Error:
                  description: 'Failed edition. Redirect to previous page.'
  /api/post/{id_post}/bookmark:
    post:
      operationId: R209
      summary: 'R209: Bookmarks a post'
      description: 'Allows a member to bookmark a post. Access: USR'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be bookmarked'
          required: true
      responses:
        '200':
          description: 'Success'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Post not found'
    delete:
      operationId: R210
      summary: 'R210: Remove a bookmark on a post'
      description: 'Allows a member to remove their bookmark on a post. Access: USR'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be unbookmarked'
          required: true
      responses:
        '200':
          description: 'Success'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Post not found'
  /post/{id_post}/edit:
    get:
      operationId: R211
      summary: 'R211: Shows edit post page'
      description: 'Allows a member to edit his post. Access: OWN'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be edited'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui06-edit-post)'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Invalid post id: Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
    patch:
      operationId: R212
      summary: 'R212: Edit a post'
      description: 'Edits the content of a post. Access: OWN'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be edited'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/NewsPost'
      responses:
        '302':
          description: 'Redirect after updating the news post content.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful edition. Redirect to post page.'
                  value: '/post/{id_post}'
                302Error:
                  description: 'Failed edition. Redirect to edit page.'
                  value: '/post/{id_post}/edit'
        '403':
          description: 'Forbidden access'
        '400':
          description: 'Bad Request'
  /api/post/{id_post}/vote:
    post:
      operationId: R213
      summary: 'R213: Rate a post'
      description: 'Allows a member to rate a news post. Access USR'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be rated'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote'
      responses:
        '200':
          description: 'Rated post successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Post not found'
        '302':
          description: 'Redirect visitor.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Redirect to login form.'
                  value: '/login'
    patch:
      operationId: R214
      summary: 'R214: Change vote on a news post'
      description: 'Allows a member to change their vote on a news post. Access: OWN'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be rated'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote'
      responses:
        '200':
          description: 'Vote edited successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Post not found'
    delete:
      operationId: R215
      summary: 'R215: Remove a vote on a news post'
      description: 'Allows a member to remove their vote on a post. Access: OWN'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to remove the rating'
          required: true
      responses:
        '200':
          description: 'Vote deleted successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Post not found'
  /api/post/{id_post}/report:
    post:
      operationId: R216
      summary: 'R216: Report a post'
      description: 'Allows a member to report a news post. Access: USR'
      tags:
        - 'M02: Posts'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          description: 'Specifies the id of the post to be reported'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                body:
                  type: string
              required:
                - body
      responses:
        '200':
          description: 'Report successfully sent'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Post not found'


  /api/post/{id_post}/comment:
    post:
      operationId: R301
      summary: 'R301: Comment on a post'
      description: 'Allows a member to comment on a post. Access: USR'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the post to be commented'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                body:
                  type: string
              required:
                - body
      responses:
        '200':
          description: 'Comment created successfully'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Post not found'
  /api/comment/{id_comment}:
    patch:
      operationId: R302
      summary: 'R302: Edit a comment'
      description: 'Allows a member to edit a comment. Access: OWN'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_comment
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be edited'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                body:
                  type: string
              required:
                - body
      responses:
        '200':
          description: 'Comment edited successfully'
          content:
            application/json:
              schema:
                type: object
                items:
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Comment not found'
    delete:
      operationId: R303
      summary: 'R303: Delete a comment'
      description: 'Allows a member to delete a comment. Access: OWN, ADM'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_comment
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be deleted'
      responses:
        '200':
          description: 'Comment deleted successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Comment not found'
  /api/post/{id_post}/comment/{id_comment}/reply:
    post:
      operationId: R304
      summary: 'R304: Reply on a comment'
      description: 'Allows a member to reply on a comment. Access: USR'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_post
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the post where the reply will be added'
        - in: path
          name: id_comment
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be replied'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                body:
                  type: string
              required:
                - body
      responses:
        '200':
          description: 'Reply created successfully'
          content:
            application/json:
              schema:
                type: object
                items:
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Comment not found'
  /api/comment/{id_comment}/report:
    post:
      operationId: R305
      summary: 'R305: Report a comment'
      description: 'Allows a member to report a comment. Access: USR'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_comment
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be reported'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                body:
                  type: string
              required:
                - body
      responses:
        '200':
          description: 'Comment reported successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Comment not found'
  /api/comment/{id_comment}/vote:
    post:
      operationId: R306
      summary: 'R306: Rate a comment'
      description: 'Allows a member to rate a comment. Access: USR'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_comment
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be voted'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote'
      responses:
        '200':
          description: 'Rated comment successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Comment not found'
    patch:
      operationId: R307
      summary: 'R307: Change vote on a comment'
      description: 'Allows a member to change their vote on a comment. Access: OWN'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_comment
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment where the vote is to be edited'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote'
      responses:
        '200':
          description: 'Vote edited successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Comment not found'
    delete:
      operationId: R308
      summary: 'R308: Remove a vote on a comment'
      description: 'Allows a member to remove a vote on a comment. Access: OWN'
      tags:
        - 'M03: Comments'
      parameters:
        - in: path
          name: id_comment
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment where the vote is to be deleted'
      responses:
        '200':
          description: 'Vote deleted successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Comment not found'


  /topic/{name}:
    get:
      operationId: R401
      summary: 'R401: Show a topic page'
      description: "Show a topic page and it's posts. Access:PUB"
      tags:
        - 'M04: Topics'
      parameters:
        - in: path
          name: name
          schema:
            type: string
          required: true
          description: 'Specifies the name of the topic'
      responses:
        '200':
          description: 'Ok. Show [UI03](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui03-topic-page)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Topic not found'
    delete:
      operationId: R402
      summary: 'R402: Delete a topic'
      description: 'Allows an admin to delete a topic. Access: ADM'
      tags:
        - 'M04: Topics'
      parameters:
        - in: path
          name: name
          schema:
            type: string
          required: true
          description: 'Specifies the name of the topic'
      responses:
        '200':
          description: 'Topic deleted successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Topic not found'
  /api/topic/{id_topic}/follow:
    post:
      operationId: R403
      summary: 'R403: Follow a topic'
      description: 'Allows a member to follow a topic. Access: USR'
      tags:
        - 'M04: Topics'
      parameters:
        - in: path
          name: id_topic
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the topic that will be followed'
      responses:
        '200':
          description: 'Topic followed successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Topic not found'
    delete:
      operationId: R404
      summary: 'R404: Unfollow a topic'
      description: 'Allows a member to unfollow a topic. Access: USR'
      tags:
        - 'M04: Topics'
      parameters:
        - in: path
          name: id_topic
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the topic that will be unfollowed'
      responses:
        '200':
          description: 'Topic unfollowed successfully'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Topic not found'
  /api/topic/{id_topic}/report:
    post:
      operationId: R405
      summary: 'R405: Report a topic'
      description: 'Allows a member to report a topic. Access: USR'
      tags:
        - 'M04: Topics'
      parameters:
        - in: path
          name: id_topic
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the topic to be reported'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Report'
      responses:
        '200':
          description: 'Report successfully sent'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Page not found.'


  /api/member/{username}/notifications:
    post:
      operationId: R501
      summary: "R501: Get member's notifications"
      description: "Returns all member's notifications as JSON. Access: USR"
      tags:
        - 'M05: Notifications'
      parameters:
        - in: path
          name: username
          schema:
            type: string
          description: 'Specifies the member username'
          required: true
      responses:
        '200':
          description: 'OK'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Notifications'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Notification not found.'


  /search:
    post:
      operationId: R601
      summary: 'R601: Search for a post, topic or member'
      description: 'Allows a website user to search for a post,topic or member. Access: PUB'
      tags:
        - 'M06: Search'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                query:
                  type: string
              required:
                - query
      responses:
        '302':
          description: 'Redirect after processing the query.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful search. Redirect to search results page.'
                  value: '/search/{query}'
        '400':
          description: 'Bad Request'
  /search/{query}:
    get:
      operationId: R602
      summary: 'R602: Search results'
      description: 'Show the search results for posts, topics or members according to query. Access: PUB'
      tags:
        - 'M06: Search'
      parameters:
        - in: path
          name: query
          schema:
            type: string
          required: true
          description: 'Specifies the query received'
      responses:
        '200':
          description: 'Success. Show [UI02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui02-search-page)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'
  /api/search/posts:
    get:
      operationId: R603
      summary: 'R603: Search Posts API'
      description: 'Searches for posts and returns the result as JSON. Access: PUB'
      tags:
        - 'M06: Search'
      parameters:
        - in: query
          name: query
          schema:
            type: string
          required: true
          description: 'Specifies the query received'
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/NewsPost'
        '400':
          description: 'Bad Request'
  /api/search/topics:
    get:
      operationId: R604
      summary: 'R604: Search Topics API'
      description: 'Searches for topics and returns the result as JSON. Access: PUB'
      tags:
        - 'M06: Search'
      parameters:
        - in: query
          name: query
          schema:
            type: string
          required: true
          description: 'Specifies the query received'
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Topic'
        '400':
          description: 'Bad Request'
  /api/search/members:
    get:
      operationId: R605
      summary: 'R605: Search Members API'
      description: 'Searches for members and returns the result as JSON. Access: PUB'
      tags:
        - 'M06: Search'
      parameters:
        - in: query
          name: query
          schema:
            type: string
          required: true
          description: 'Specifies the query received'
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Member'
        '400':
          description: 'Bad Request'


  /admin:
    get:
      operationId: R701
      summary: 'R701: Show admin page'
      description: 'Shows a admin page with most reported content. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Ok. Show [UI13](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui13-administration-area)'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Invalid filter: Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
  /api/reports/posts:
    get:
      operationId: R702
      summary: 'R702: Reported Posts API'
      description: 'Returns reported posts as JSON. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/NewsPost'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /api/reports/comments:
    get:
      operationId: R703
      summary: 'R703: Reported Comments API'
      description: 'Returns reported comments as JSON. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /api/reports/topics:
    get:
      operationId: R704
      summary: 'R704: Reported Topics API'
      description: 'Returns reported topics as JSON. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Topic'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /api/reports/members:
    get:
      operationId: R705
      summary: 'R705: Reported Members API'
      description: 'Returns reported members as JSON. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Success'
          content:
            application/json:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Member'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
  /about:
    get:
      operationId: R706
      summary: 'R706: About Us page'
      description: 'Show about us page. Access: PUB'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Ok. Show [UI12](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui12-about-us)'
        '400':
          description: 'Bad Request'
  /404:
    get:
      operationId: R707
      summary: 'R707: 404 page'
      description: 'Show 404 (Not found) page. Access: PUB'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Ok. Show [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2133/-/wikis/er#ui14-error-404-page)'
        '400':
          description: 'Bad Request'


components:
  schemas:
    Member:
      type: object
      properties:
        id:
          type: integer
        username:
          type: string
        full_name:
          type: string
        bio:
          type: string
        aura:
          type: integer
        profile_image:
          type: string
          format: byte
        banner_image:
          type: string
          format: byte
    Topic:
      type: object
      properties:
        id:
          type: integer
        name:
          type: string
    Comment:
      type: object
      properties:
        id:
          type: integer
        body:
          type: string
        date_time:
          type: string
          format: date-time
        aura:
          type: integer
        id_owner:
          type: integer
    NewsPost:
      type: object
      properties:
        id:
          type: integer
        title:
          type: string
        body:
          type: string
        date_time:
          type: string
          format: date-time
        aura:
          type: integer
        id_owner:
          type: integer
        username:
          type: string
        topics:
          type: array
          items:
            $ref: '#/components/schemas/Topic'
        images:
          type: array
          items:
            type: string
            format: byte
    Report:
      type: object
      properties:
        id_object:
          type: integer
        body:
          type: string
        date_time:
          type: string
          format: date-time
    Vote:
      type: object
      properties:
        vote:
          type: boolean
          enum: [true,false]
    FollowNotification:
      type: object
      properties:
        id_follower:
          type: integer
        username_follower:
          type: string
        date_time:
          type: string
          format: date-time
    CommentNotification:
      type: object
      properties:
        id_comment:
          type: integer
        id_post:
          type: integer
        title_post:
          type: string
        date_time:
          type: string
          format: date-time
    ReplyNotification:
      type: object
      properties:
        id_reply:
          type: integer
        id_post:
          type: integer
        title_post:
          type: integer
        date_time:
          type: string
          format: date-time
    Notifications:
      type: object
      properties:
        follows:
          type: array
          items:
            $ref: '#/components/schemas/FollowNotification'
        comments:
          type: array
          items:
            $ref: '#/components/schemas/CommentNotification'
        replies:
          type: array
          items:
            $ref: '#/components/schemas/ReplyNotification'

```

<div style="page-break-after: always; break-after: page;"></div>


## A8: Vertical prototype

The Vertical Prototype includes the implementation of highly important user stories and aims to validate the architecture presented, while also serving to gain familiarity with the technologies used in the project.

The implementation is based on the LBAW Framework and includes work on all layers of the architecture of the solution to implement: user interface, business logic and data access. The prototype includes the implementation of pages of visualization, insertion, edition and removal of information; the control of permissions in the access to the implemented pages; and a presentation of error and success messages.



### 1. Implemented Features

#### 1.1. Implemented User Stories

The following table describes the user stories from previous artefacts that were implemented in the prototype.

| User Story reference | Name                   | Priority                   | Description                   |
| -------------------- | ---------------------- | -------------------------- | ----------------------------- |
| US101                 | Main Page News         | High                       | As a User, I want to access the website's main page, so that I can see the latest news about gaming. |
| US102                 | Profile Page           | High                       | As a User, I want to consult the profile of a Member, so that I can see their biography,  profile picture, reputation score, number of followers and posted news. |
| US103  | View Member's Posted News Posts     | High     | As a User, I want to be able so see in a Member's profile page the news posts they've created so that I can easily access them. |
| US104                 | View Member's Comments              | High     | As a User, I want to be able so see in a Member's profile page the comments they've  posted so that I can easily access them. |
| US105                 | View Member's Followed Members              | High     | As a User, I want to be able so see a Member's followed members so that I can search for people to follow. |
| US106                 | View Member's Followers              | High     | As a User, I want to be able so see a Member's followers so that I can search for people to follow. |
| US107                 | View Member's Followed Topics              | High     | As a User, I want to be able so see a Member's followed topics so that I can search for topics to follow. |
| US110                 | News Post Page         | High                       | As a User, I want to access the page of a specific news post so that I can see more details about that post and its comments. |
| US111                 | Main Page Trending Topics         | Medium                     | As a User, I want to consult the top trending topics on the main page so that I can discover other gaming topics that are popular.|
| US112                 | Main Page Hall of Fame         | Medium                       | As a User, I want to see the Members with the most Aura score, so that I can find interesting people to follow.|
| US21                 | Sign Up                | High                       | As a Visitor, I want to register myself into the system, so that I can become a Member. |
| US22                 | Log In                 | High                       | As a Visitor, I want to authenticate into the system, so that I can have Member privileges. |
| US311                | Logout                 | High                       | As a Member, I want to logout from the system, so that other users are able to login in the same computer. |
| US351                | View Bookmarked News Posts  | High                  | As a Member, I want to be able so see in my profile page the news posts I've bookmarked so that I can easily access them. |
| US352 | Edit Profile Information | High | As a Member, I want to edit my own profile information (e.g. name, profile picture, biography), so that it can be up to date. |
| US353                | Edit Account Settings  | High                       | As a Member, I want to edit my account settings (e.g. email, password), so that I can keep my account safe. |
| US354                | Delete Account         | High                       | As a Member, I want to be able to delete my account, so that I can remove all information I posted on the website. |

<div style="page-break-after: always; break-after: page;"></div>

#### 1.2. Implemented Web Resources

The following table documents the web resources from previous artefacts that were implemented in the prototype.

##### Module M01: Authentication and Individual Profile

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R101: Login Form       | [/login](http://lbaw2133.lbaw-prod.fe.up.pt/login) |
| R102: Login Action     | POST /login |
| R103: Logout Action    | GET /logout |
| R104: Register Form    | [/signup](http://lbaw2133.lbaw-prod.fe.up.pt/signup) |
| R105: Register Action  | POST /signup |
| R106: Members Profile  | [/member/{username}](http://lbaw2133.lbaw-prod.fe.up.pt/member/EW22Corgi) |
| R107: Edit Profile Form  | [/member/{username}/edit](http://lbaw2133.lbaw-prod.fe.up.pt/member/EW22Corgi/edit) |
| R108: Edit Profile Action  | PATCH /member/{username}/edit |
| R109: Member account settings | [/member/{username}/settings](http://lbaw2133.lbaw-prod.fe.up.pt/member/EW22Corgi/settings) |
| R110: Change members email | PATCH /api/change_email |
| R111: Change members password | PATCH /api/change_password |
| R112: Delete an account | DELETE /api/member/{username} |
| R116: Member's posts | GET /api/member/{username}/posts/{page} |
| R117: Member's comments | GET /api/member/{username}/comments/{page} |
| R118: Member's bookmarked posts | GET /api/member/{username}/bookmarked/{page} |


##### Module M02: Posts
| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R201: Shows main page  | [/home](http://lbaw2133.lbaw-prod.fe.up.pt/home) |
| R202: Main page feed posts | POST /api/home/feed/{page} |
| R203: Main page trending posts | POST /api/home/trending/{page} |
| R204: Main page latest posts | POST /api/home/latest/{page} |
| R207: Shows a news post | [/post/{id_post}](http://lbaw2133.lbaw-prod.fe.up.pt/post/90) |



### 2. Prototype

The prototype is available at http://lbaw2133.lbaw-prod.fe.up.pt/

**User Credentials:**
- Email: ewyche13@google.co.uk
- Password: #Password123

***


## Revision history

Changes made to the first submission: N/A

***
GROUP2133, 27/04/2021
* André Nascimento, up201806461@fe.up.pt
* Caio Nogueira, up201806218@fe.up.pt
* Diogo Almeida (editor), up201806630@fe.up.pt
* Gustavo Sena, up201806078@fe.up.pt