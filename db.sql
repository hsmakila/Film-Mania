DROP DATABASE IF EXISTS film_mania;
CREATE DATABASE film_mania;
USE film_mania;

CREATE TABLE faq (
    faq_id INT PRIMARY KEY AUTO_INCREMENT,
    question TEXT NOT NULL,
    answer TEXT NOT NULL
);

INSERT INTO faq (question, answer) VALUES
    ('How do I sign up for an account?', 'To sign up, click on the "Sign Up" button on the top-right corner of the website and follow the registration process.'),
    ('Can I watch movies offline?', 'No, currently, our platform only supports online streaming, and you need an internet connection to watch movies.'),
    ('How can I cancel my subscription?', 'To cancel your subscription, go to your account settings, and choose the "Cancel Subscription" option.'),
    ('Are there any parental controls?', 'Yes, we offer parental controls to restrict access to certain content. You can set them up in your account settings.'),
    ('What devices can I use to stream movies?', 'Our streaming platform is accessible on various devices, including desktops, smartphones, tablets, smart TVs, and gaming consoles.'),
    ('Is there a free trial period?', 'Yes, we offer a 7-day free trial for new users to explore our platform and its content.'),
    ('Do you support multiple profiles per account?', 'Yes, you can create multiple profiles under one account to personalize the viewing experience for each user.'),
    ('What payment methods are accepted?', 'We accept major credit cards, debit cards, and PayPal for subscription payments.'),
    ('How do I reset my password?', 'To reset your password, click on the "Forgot Password" link on the login page and follow the instructions sent to your email.'),
    ('Is closed captioning available?', 'Yes, we provide closed captioning for a wide range of movies and shows to ensure accessibility for all users.'),
    ('Can I change my subscription plan?', 'Yes, you can upgrade or downgrade your subscription plan at any time in your account settings.'),
    ('Are there any regional restrictions?', 'Some content may have regional restrictions due to licensing agreements. We strive to provide a diverse library for all regions.'),
    ('How often is the movie library updated?', 'We regularly update our movie library with new releases and classic titles to keep the content fresh.'),
    ('Can I download movies to watch offline later?', 'No, at the moment, downloading movies for offline viewing is not supported.'),
    ('Is the streaming quality adjustable?', 'Yes, you can adjust the streaming quality based on your internet speed and device capabilities.'),
    ('Are there any advertisements during streaming?', 'No, we offer an ad-free streaming experience to all our subscribers.'),
    ('Can I watch movies with friends?', 'Yes, we offer a "Watch Party" feature that allows you to watch movies simultaneously with friends in real-time.'),
    ('Is there a limit to the number of devices I can use?', 'Yes, there is a device limit per account, but you can manage your authorized devices in your account settings.'),
    ('What happens if my internet connection is lost during streaming?', 'If your internet connection is lost, the playback will pause, and you can resume once the connection is restored.'),
    ('Can I request a movie to be added to the library?', 'Yes, we encourage user suggestions for new movie additions. You can submit your requests through our contact page.'),
    ('Is there a recommendation system?', 'Yes, our platform uses a recommendation algorithm to suggest movies based on your viewing history.'),
    ('Are subtitles available for all movies?', 'We provide subtitles for most of our movies, but availability may vary.'),
    ('Can I watch movies in multiple languages?', 'Yes, we offer a selection of movies in different languages to cater to diverse audiences.'),
    ('Is there a watch history feature?', 'Yes, we maintain a watch history for each user to keep track of the movies they have watched.'),
    ('What happens if a movie is removed from the library?', 'If a movie is removed, it will no longer be accessible for streaming, but your watch history for that movie will still be available.'),
    ('How can I report a technical issue?', 'If you encounter any technical issues, you can contact our support team through the website or email.'),
    ('Can I change the streaming resolution?', 'Yes, you can manually select the streaming resolution from the playback settings.'),
    ('Is there a queue feature?', 'Yes, you can add movies to your queue to create a personalized list of movies to watch later.'),
    ('Do you offer 4K Ultra HD streaming?', 'Yes, some of our movies are available for streaming in 4K Ultra HD quality, provided your device and internet connection support it.'),
    ('Is there a limit to the number of movies I can watch in a day?', 'No, there are no limits on the number of movies you can watch within your subscription period.'),
    ('Do you offer a refund policy?', 'Yes, we have a refund policy within a certain time frame from the date of subscription.'),
    ('Are there any age restrictions for certain movies?', 'Yes, some movies are rated and may have age restrictions. We comply with the content rating guidelines.'),
    ('How can I update my billing information?', 'You can update your billing information in your account settings under the "Payment" section.'),
    ('Do you offer a loyalty rewards program?', 'Yes, we have a loyalty rewards program for long-term subscribers with exclusive benefits.'),
    ('Can I share my account with family and friends?', 'While sharing accounts is not encouraged, you can create multiple profiles under one account for your family members.'),
    ('Are there any special discounts available?', 'We occasionally offer promotional discounts and deals. Keep an eye on our website and social media for updates.'),
    ('Can I watch movies on multiple devices simultaneously?', 'The number of simultaneous streams allowed depends on your subscription plan. Some plans support multiple streams.'),
    ('Is there a watchlist feature?', 'Yes, you can add movies to your watchlist to keep track of titles you want to watch in the future.'),
    ('Can I rate and review movies?', 'Yes, you can rate movies you are watched and leave reviews to share your opinions with other users.'),
    ('How can I contact customer support?', 'You can reach our customer support team through the "Contact Us" page on our website.'),
    ('Can I watch movies in different regions while traveling?', 'The availability of content may vary based on your current region due to licensing restrictions.'),
    ('Do you offer live streaming of events?', 'Currently, we do not provide live streaming of events. We focus on a curated library of movies and shows.'),
    ('Is there a loyalty program for frequent viewers?', 'Yes, we have a loyalty program that rewards frequent viewers with badges and exclusive content.'),
    ('Are there any restrictions on the number of times I can watch a movie?', 'No, you can watch any movie in the library as many times as you like during your subscription period.'),
    ('Can I download my watch history?', 'We do not currently offer the option to download your watch history, but it is stored securely on our servers.'),
    ('Is there a community forum for users?', 'Yes, we have an active community forum where users can discuss movies, share recommendations, and interact.'),
    ('Can I watch movies in different languages?', 'Yes, we offer a variety of movies in different languages to cater to our global audience.'),
    ('Are there any exclusive original movies?', 'Yes, we produce exclusive original movies available only on our platform.'),
    ('How can I change my email address?', 'You can change your email address in your account settings under the "Account Info" section.'),
    ('Can I request subtitles for a movie?', 'Yes, if a movie lacks subtitles, you can submit a request for subtitles through our contact page.');

CREATE TABLE Category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL
);

INSERT INTO Category (category_name) VALUES
    ('Action'),
    ('Comedy'),
    ('Drama'),
    ('Sci-Fi'),
    ('Horror'),
    ('Fantasy'),
    ('Romance'),
    ('Thriller'),
    ('Adventure'),
    ('Animation'),
    ('Family');

CREATE TABLE Actor (
    actor_id INT PRIMARY KEY AUTO_INCREMENT,
    actor_name VARCHAR(100) NOT NULL
);

INSERT INTO Actor (actor_name) VALUES
    ('Tom Hanks'),
    ('Tim Allen'),
    ('Jennifer Lawrence'),
    ('Josh Hutcherson'),
    ('Leonardo DiCaprio'),
    ('Ellen Page'),
    ('Emma Watson'),
    ('Daniel Radcliffe'),
    ('Anne Hathaway'),
    ('Johnny Depp'),
    ('Keira Knightley'),
    ('Robert Downey Jr.');

CREATE TABLE Movie (
    movie_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    release_date DATE,
    summary TEXT,
    director VARCHAR(100),
    runtime_minutes INT,
    trailer_url VARCHAR(200),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Category(category_id)
);

-- INSERT INTO Movie (title, release_date, summary, director, runtime_minutes, trailer_url, category_id) VALUES
--     ('Toy Story', '1995-11-22', 'A story about toys that come to life when their owner is not around.', 'John Lasseter', 81, 'https://www.youtube.com/embed/v-PjgYDrg70', 1),
--     ('The Hunger Games', '2012-03-23', 'In a dystopian future, teenagers are forced to participate in a televised death match.', 'Gary Ross', 142, '', 2),
--     ('Inception', '2010-07-16', 'A thief enters people''s dreams to steal their secrets.', 'Christopher Nolan', 148, '', 3),
--     ('Harry Potter and the Sorcerer''s Stone', '2001-11-16', 'A young boy discovers he is a wizard and attends a magical school.', 'Chris Columbus', 152, '', 6),
--     ('Pirates of the Caribbean: The Curse of the Black Pearl', '2003-07-09', 'A pirate and a blacksmith team up to rescue a kidnapped girl and save cursed treasure.', 'Gore Verbinski', 143, '', 9),
--     ('Iron Man', '2008-05-02', 'A genius inventor builds a powered exoskeleton and becomes a superhero.', 'Jon Favreau', 126, 'https://www.youtube.com/embed/8ugaeA-nMTc', 1),
--     ('The Notebook', '2004-06-25', 'A man reads a love story to a woman with Alzheimer''s disease.', 'Nick Cassavetes', 123, '', 7);

INSERT INTO Movie (title, release_date, summary, director, runtime_minutes, trailer_url, category_id)
VALUES
('Toy Story', '1995-11-22', 'A story about toys that come to life when their owner is not around.', 'John Lasseter', 81, 'https://www.youtube.com/embed/v-PjgYDrg70',10),
('The Hunger Games', '2012-03-23', 'In a dystopian future, teenagers are forced to participate in a televised death match.', 'Gary Ross', 142, 'https://www.youtube.com/watch?v=mfmrPu43DF8',9),
('Inception', '2010-07-16', 'A thief enters people''s dreams to steal their secrets.', 'Christopher Nolan', 148, 'https://www.youtube.com/results?search_query=inception+movie+trailer',4),
('Harry Potter and the Sorcerer''s Stone', '2001-11-16', 'A young boy discovers he is a wizard and attends a magical school.', 'Chris Columbus', 152, 'https://www.youtube.com/results?search_query=harry+potter+movie+trailer',6),
('Pirates of the Caribbean: The Curse of the Black Pearl', '2003-07-09', 'A pirate and a blacksmith team up to rescue a kidnapped girl and save cursed treasure.', 'Gore Verbinski', 143, 'https://www.youtube.com/watch?v=Hgeu5rhoxxY',9),
('Iron Man', '2008-05-02', 'A genius inventor builds a powered exoskeleton and becomes a superhero.', 'Jon Favreau', 126, 'https://www.youtube.com/embed/8ugaeA-nMTc',1),
('The Notebook', '2004-06-25', 'A man reads a love story to a woman with Alzheimer''s disease.', 'Nick Cassavetes', 123, '',7),
('Salt', '2010-07-23', 'When Evelyn Salt (Angelina Jolie) became a CIA officer, she swore an oath to duty, honor and country. But, when a defector accuses her of being a Russian spy, Salt''s oath is put to the test. Now a fugitive, Salt must use every skill gained from years of training and experience to evade capture, but the more she tries to prove her innocence, the more guilty she seems.', 'Phillip Noyce', 104, 'https://www.youtube.com/watch?v=QZ40WlshNwU',1),
('The Lord of the Rings', '2001-12-19', 'What is the main plot of Lord of the Rings? A hobbit named Frodo inherits the One Ring, which can destroy the entire world. With the recently reawakened evil being Sauron after the ring to cement his reign, Frodo joins with eight others to destroy the Ring and defeat Sauron.', 'Peter Jackson', 178, 'https://www.youtube.com/watch?v=V75dMMIW2B4',6),
('Godzilla vs. Kong', '2021-03-31', 'Kong and his protectors undertake a perilous journey to find his true home. Along for the ride is Jia, an orphaned girl who has a unique and powerful bond with the mighty beast. However, they soon find themselves in the path of an enraged Godzilla as he cuts a swath of destruction across the globe. The initial confrontation between the two titans -- instigated by unseen forces -- is only the beginning of the mystery that lies deep within the core of the planet.', 'Adam Wingard', 113, 'https://www.youtube.com/watch?v=odM92ap8_c0', 1),
('The Frightening', '1905-07-14', 'On his first day at Hallow End High School, Corey Peterson discovers that a rash of murders is occurring on campus. Soon, a battle emerges between jocks and geeks, and Corey must choose a side.', 'David DeCoteau', 86, 'https://www.youtube.com/watch?v=HTLPULt0eJ4', 5),
('Bhoot Police', '2021-09-10', 'Two brothers, Vibhooti and Chiraunji, have fought for their share of ghosts. A new case forces them to rethink their own abilities and beliefs.', 'Pawan Kripalani', 129, 'https://youtu.be/-j7mGq3s3eA', 5),
('The Conjuring', '2019-07-13', 'In 1970, paranormal investigators and demonologists Lorraine (Vera Farmiga) and Ed (Patrick Wilson) Warren are summoned to the home of Carolyn (Lili Taylor) and Roger (Ron Livingston) Perron. The Perrons and their five daughters have recently moved into a secluded farmhouse, where a supernatural presence has made itself known. Though the manifestations are relatively benign at first, events soon escalate in horrifying fashion, especially after the Warrens discover the house''s macabre history.', 'James Wan', 112, 'https://youtu.be/k10ETZ41q5o', 5),
('The Haunting', '2005-10-03', 'After her nephew dies, a woman (Kim Raver) dismisses her young daughter''s claim of being in contact with the dead boy.', 'Ralph Hemecker', 120, 'https://www.youtube.com/watch?v=tYy9PZd16qc', 5),
('Darbar', '2020-01-09', 'A police officer is on a chase to hunt down a dreaded gangster to fulfill his own secret agenda.', 'A.R. Murugadoss', 160, 'https://youtu.be/1JlLi9pDaJE', 1),
('Titanic', '1997-12-19', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'James Cameron', 194, 'https://youtu.be/CHekzSiZjrY', 7),
('Sita Ramam', '2022-08-05', 'An orphaned soldier''s life changes after he receives a letter from a girl named Sita. He meets her and love blossoms between them. When he returns to her camp in Kashmir, he sends a letter to Sita that will not reach her.', 'Hanu Raghavapudi.', 162, 'https://youtu.be/3UKsbXQUwqw', 7),
('Lagaan', '2001-06-15', 'During the British Raj, a farmer named Bhuvan accepts the challenge of Captain Andrew Russell to beat his team in a game of cricket and enable his village to not pay taxes for the next three years.', 'Ashutosh Gowariker', 222, 'https://youtu.be/Nhi4Azs2nEw', 3),
('100 Days of Love', '2015-03-20', 'Despite their strained history as children, a columnist falls in love with his schoolmate when they meet after years. Just as he decides to win her heart, he learns that she is engaged to another man.', 'Januse Mohammed Majeed', 155, 'https://youtu.be/q23px5zEnXk', 7),
('Airlift', '2016-01-22', 'Ranjit Katiyal, an Indian businessman, leads a happy and successful life in Kuwait with his family. However, when Iraq invades Kuwait, he decides to risk his life to save his stranded countrymen.', 'Raja Krishna Menon', 130, 'https://youtu.be/vb5xCMbMfZ0', 3);



CREATE TABLE ActorMovieLink (
    link_id INT PRIMARY KEY AUTO_INCREMENT,
    movie_id INT,
    actor_id INT,
    FOREIGN KEY (movie_id) REFERENCES Movie(movie_id),
    FOREIGN KEY (actor_id) REFERENCES Actor(actor_id)
);

INSERT INTO ActorMovieLink (movie_id, actor_id) VALUES
    (1, 1),
    (1, 2),
    (2, 3),
    (2, 4),
    (3, 5),
    (3, 6),
    (4, 8),
    (4, 7),
    (5, 10),
    (5, 11),
    (6, 12),
    (7, 9);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    subscribed BOOLEAN NOT NULL DEFAULT 0
);

INSERT INTO users (name, email, password, subscribed) VALUES
    ('Admin', 'admin@filmmania.com', 'admin', 1),
    ('Akila', 'akila@gmail.com', '123', 0),
    ('Hiruni', 'hiruni@gmail.com', '234', 1),
    ('Gayani', 'gayani@gmail.com', '345', 1),
    ('Chamara', 'chamara@gmail.com', '456', 0);
