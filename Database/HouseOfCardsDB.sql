-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 06:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HouseOfCardsDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `entryID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `postedOnDate` date,
  `postedOnTime` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`id`, `content`, `entryID`, `UserID`) VALUES
(0, 'wow', 1, 3),
(1, 'so cool', 2, 4),
(2, 'changed my life', 5, 6),
(3, 'thumbs down', 4, 2),
(4, 'get a life', 8, 3),
(5, 'actually i agree with capital punishment', 9, 1),
(6, 'pog', 7, 5),
(7, 'pls send bob vagen', 6, 2),
(8, 'k.', 10, 3);


-- --------------------------------------------------------

--
-- Table structure for table `CommentReply`
--

CREATE TABLE `CommentReply` (
  `id` int(10) NOT NULL,
  `commentID` int(10) NOT NULL,
  `positionID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `postedOnDate` date,
  `postedOnTime` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CommentReply`
--

INSERT INTO `CommentReply` (`id`, `content`, `commentID`, `UserID`) VALUES
(0, 'cry abt it', 0, 3),
(1, 'blah', 1, 4),
(2, 'Jasmeender', 2, 6),
(3, 'Siwon', 3, 2),
(4, 'George', 4, 3),
(5, 'Daniel', 5, 1),
(6, 'Troy', 6, 5),
(7, 'Barthalomew', 7, 2),
(8, 'Putin', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `id` int(10) NOT NULL,
  `entryID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`id`, `entryID`, `userID`, `rating`) VALUES
(0, 7, 0, 2),
(1, 3, 1, 4),
(2, 1, 2, 5),
(3, 6, 3, 2),
(4, 5, 4, 3),
(5, 2, 5, 1),
(6, 3, 6, 5),
(7, 8, 7, 2),
(8, 2, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wikiEntry`
--

CREATE TABLE `wikiEntry` (
  `id` int(10) NOT NULL,
  `gameName` varchar(200) NOT NULL,
  `requiredItems` varchar(200) NOT NULL,
  `objective` varchar(200) NOT NULL,
  `setUp` varchar(200) NOT NULL,
  `gamePlay` varchar(200) NOT NULL,
  `rules` varchar(200) NOT NULL,
  `lastEditedBy` int(10) NOT NULL,
  `lastEditedDate` date,
  `lastEditedTime` time(6) DEFAULT NULL
  `minPlayer` int(10) NOT NULL,
  `maxPlayer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wikiEntry`
--

INSERT INTO `wikiEntry` (`id`, `gameName`, `requiredItems`, `objective`, `setUp`, `gamePlay`, `rules`, `lastEditedBy`, `lastEditedDate`, `lastEditedTime`, `minPlayer`, `maxPlayer`) VALUES
(0, 'Go Fish', '52 card deck', 'To win, a player must have the most sets of four matching number cards.', 'Deal seven cards (2-3 players) to each player or five cards (4-5 players), then place rest of the deck is placed between all players with additional room for placing the matching sets of cards.', `During a players turn, the player may ask another player if they have a card, specifying the number. The player who was asked must give all cards of the number specified to the player who asked. If they do not have any cards of the specified number, they must say ""Gold Fish"", and the player who asked must draw a card from the deck. If a player does recieve one or more cards of that they asked for, their turn continues and they can ask any player for cards of a specific number again./nWhen a player obtains all four cards of a number, they must place the set of cards face up in front of them for other players to see. The game ends when all thirteen sets of cards are placed face up, and the player with the most sets wins.`, `The cards rank from ace (high) to two (low). Suits are not important for this game.`, 'Nick', '09/17/01', NULL, 2, 5),
(1, 'Blackjack', '52 card deck', 'Each player attempts to beat the dealer by having a hand that adds up as close to 21 as possible, without going over 21.', 'One player must be designated as dealer. The dealer deals two cards face up to each player, however the dealer has one face up and one face down.', 'Each player must decide if they would like to get dealt another card (Hit) or remain with the cards they have (Stand). The dealer must deal out a card to any player who asks for a Hit, but if a player recieves a card and the total of their hand exceeds 21, they Bust, and lose the round. Once every player has Stand or has Bust, the dealer flips their face down card. If the dealers hand totals 16 or less, they must draw another card until their total is above 16. If the dealer Bust, each player who has not Bust wins the round. If there is a tie, neither dealer or player wins the round. /nIf any players get dealt a natural (a 10 or face card and an ace) they immediately win the round. If the dealer has a natural while any players do not have a natural, the dealer wins the round.','Face cards count for 10 points, and numbered cards count for their respective number value. Ace cards may count for 1 point or 11 points, each player may pick the value based on their needs during play. /nEach player can win or lose against the dealer, the results of one player does not impact the round for other players.', 'Nick', '09/17/01', NULL, 2, 7),
(2, 'War', '52 card deck', 'Obtain the entire deck of cards.', 'Deal 26 cards (half the deck) to each player, the piles should be face down in front of each player.', 'Each round, each player will reveal the card on the top of their pile. The player with the higher card wins the round and takes both cards, placing them at the bottom of their pile. If there is a draw, both players will then reveal two more cards, one face down and one face up. The player with the higher card wins the round and takes all 6 cards. Repeat this process if another draw occurs. The player that obtains the entire deck of cards wins the game.', 'No rules', 'Nick', '09/17/01', NULL, 2, 7),
(3, 'Thirty-One', '52 card deck', 'To win, a player must obtain a hand which is nearest to a total of 31 in cards of one suit during the showdown.', 'Deal three cards face down to each player, then place rest of the deck is placed between all players with additional room for a discard pile.', 'During a players turn, the player can choose to pick a card from the deck or discard pile and then they must discard a card. When a player is comfortable with their hand, they may call for a showdown by knocking on the table. Each player (not including the one who knocked) will have one more turn to try and improve their hand. The player with the lowest hand loses the round, and if the player who called for the showdown has the lowest hand, it counts as 2 losses. After losing 4 times, the player is out of the game. The last player left wins the game.', 'Face cards count for 10 points, Ace cards count for 11 points, and numbered cards count for their respective number value. A three of a kind is worth 30 points regardless of the card value./n(Optional Rules) /nA hand greater than 31 will not be counted during the showdown.', 'Nick', '09/17/01', NULL, 2, 10),
(4, 'Cheat', '52 card deck', 'To win, a player must play all their cards till hand is empty.', 'To win, a player must play all their cards till hand is empty.', 'On their turn, each player must place 1 to 4 cards face down on the table, they must announce how many of the card they have played. This statement does not need to be the truth. This process must start from aces, then proceed up to kings and starts over with aces again.\nAfter a player has played their cards and announced what they have played, any other player may call "Cheat" if they doubt the validity of the players move. The cards that were played are revealed and if the player did indeed play what they said they played, the player who called "Cheat" must take all the cards played up till this point. If the player did lie about what they played, they must take the cards.', '"Cheat" must be called before the next player plays their cards.', 'Nick', '09/17/01', NULL, 2, 7),
(5, 'Speed', '52 card deck', 'To win, a player must play all their cards till their pile of cards is empty.', '"Place two cards beside each other, face down, between the players, then place two stacks of 5 cards, face down, on the outside of the two previous cards. /nSplit the rest of the deck between the players, this is their draw pile. Each player can draw 5 cards to their hand, leaving the rest of draw pile beside them."', 'Both players prepare to flip the 2 face down cards in the center, one player will countdown and then both players can flip the card. /nPlayers may play a card from their hand at anytime as long as it is 1 higher or lower in value than either of the face up cards in the center. Each player can draw cards from their draw pile until they have 5 cards. /nIf neither player has a card 1 higher or lower than either card in the center, then both players may agree to play a card from both relief piles (the stack of 5 cards placed beside the cards in the center). The game proceeds until one player plays all the cards in their draw pile and they win the game.', 'Players may not have more than 5 cards in their hand at any time. Both players must agree when to pull from the relief piles, counting down before doing so. An Ace can be played on a King and vice-versa.', 'Nick', '09/17/01', NULL, 2, 7),
(6, 'Palace', '52 card deck', 'To win, a player must play all their cards till hand is empty.', '"Deal 3 cards to each player in three rows, they may not look at the cards. Then deal 6 cards as a hand to each player, they may look at the cards. Players select 3 cards from their hand to place on top of the 3 face down cards in front of them. /nThe rest of the deck is placed between the players as a draw pile, leaving room for a play pile. "', '"A card is drawn from the draw pile and placed in the play pile to start the game. /nOn a players turn, they must play a card of the same or higher value than the card on the top of the play pile. Multiple cards can be played as long as they are all equal. Players must draw cards to maintain a hand of 3 cards after playing a card. If a player does not have a card higher thant he card on top of the play pile, they must draw the entire play pile to their hand./nOnce a players hand is empty, they must use the three face up cards in front of them to play their turn. After using up the face up cards, the player must then use the face down cards. When a player has played all their face down cards, they win the game.', 'Cards are ranked from (highest) Ace, King and down to 3 (lowest) /n2s reset the pile back down to 2, so the next player can play any card /n7s only allows the next player to play a card lower than 7 /n10s remove what is currently in the play pile from the game, the player who played it can play any card after', 'Nick', '09/17/01', NULL, 2, 7),
(7, 'Trash', '52 card deck', 'To win, a player must be the first to complete a sequence of ten cards, from ace through ten', 'Deal ten cards to each player face down in two rows of five cards each. Players are not allowed to look at their cards. The remaining cards are placed face down to form the draw pile.', 'On their turn, the player draws a card from the draw pile. If the card is any card ace through ten, the player places that card in its correct location in the two rows dealt to them; the top left of the two rows being aces, and the bottom right being tens. The player must remove the face down card that is occupying that location and turn it face up. This card, in turn, is placed in its appropriate location, if available, displacing the face down card that was there. This continues until the player finds a card that cannot be placed - a Queen or a King or a number card whose location is already occupied by a face up card with that number. The player must then discard the unplayable card, placing it face up on the table next to the draw pile to begin a discard pile, and the turn to play passes to the next player. /nThe next player will begin their turn by drawing either the top card of the face down stock pile or the top card of the discard pile. The player will then repeat the steps mentioned previously, placing the card in the correct location in their set of two rows. /nSince Jacks are wild, a Jack can be placed face up in any location containing a face down card, displacing the card that was there. Also a pip card whose correct location currently contains a face up Jack can be placed in that location displacing the Jack, which can then be moved to any other location with a face down card, displacing the card that was there. /nIf the draw pile runs out before anyone completes their layout, the cards of the discard pile, apart from its top card which is left in place, are shuffled to make a new draw pile.', 'Numeric cards hold their respective values, Jacks are wild cards, and Queens and Kings automatically end the players turn', 'Nick', '09/17/01', NULL, 2, 7),
(8, 'Crazy Eights', '52 card deck', 'To win, a player must play all their cards till hand is empty.', 'Deal 5 cards to each player, face down. The rest of the deck is placed face down in the center of the table and forms the draw pile. Flip the top card of the draw pile and places it in a separate pile, this card forms the start of the discard pile. If the flipped card is an eight, it is buried in the middle of the pack and the next card is flipped.', 'On their turn, a player must play one card which matches the suit or number/face of the card on top of the discard pile./nIf unable to play, cards are drawn from the top of the stock until they draw a card they can play. A player may choose to draw a card, even if the player holds a playable card. If the draw pile is emptied when a player is drawing cards, the player must pass./nEights are a wild card, when played, the player must specify a suit for the next player must match or play another eight.', 'The player who is the first to have no cards left wins the game. The winning player collects from each other player the value of the cards remaining in that players hand as follows:/nEach eight = 50 points/nEach K, Q, J or 10 = 10 points/nEach ace = 1 point/nEach other card is worth their numeric value', 'Nick', '09/17/01', NULL, 2, 7),
(9, 'Big Two', '52 card deck', 'To win, a player must play all their cards till hand is empty.', 'Deal the deck into 4 even hands, each player will take one (ignore the extra hand if playing with less than 4 players).', 'The player with the lowest card may begin the game. They must play any standard poker hand which includes the lowest card. The next player must play the same type of hand as the previous player but with higher values. When a player cannot play, they may pass. If all player cannot beat the previous hand and pass, the player who played the previous hand can play any hand they would like. Once a player`s hand is empty, they win the game.', 'Cards are ranked from (highest)2s, Aces, Kings down to 3 (lowest), with suits being ranked (highest) Spades, Hearts, Clubs, Diamonds (lowest)./nThis game uses standard poker hands and rankings./nSingle < Pair < Two Pairs < Three of a Kind < Straight < Flush < Full House < Four of a Kind < Straight Flush < Royal Flush', 'Nick', '09/17/01', NULL, 2, 4),
(10, 'Rum', '52 card deck', 'Each player tries to form matched sets consisting of groups of three or four of a kind, or sequences of three or more cards of the same suit.', 'Deal 10 cards to each player (two players), or 7 cards (3-4 players), or 6 cards (5-6). The remaining cards are placed face down on the table, forming the draw pile./nThe top card of the draw pile is turned face up and becomes the upcard. It is placed next to the draw pile to start the discard pile.', 'On their turn a player must either draw a card or take the top card of the discard pile and add it to their hand. The player may play any matching set face up on the table. If the player does not wish to play a matching set or cannot play one, they must discard a card, face up. If a player chose to draw the card from the top of the discard pile, they may not discard the same card they drew. /nA player may add one or more cards from their had to any matched set that has been set on the table on their turn, this includes the fourth card of any three set, or any card that continues the sequence. However, if all the cards remaining in the players hand match, they may immediately play their cards./nWhen a player gets rid of all their cards, they win the game.', 'No rules', 'Nick', '09/17/01', NULL, 2, 7),
(11, 'Solitaire', '52 card deck', 'Objective', 'Setup', 'Gameplay', 'Rules', 'Nick', '09/17/01', NULL, 2, 7),
(12, 'Poker', '52 card deck', 'Objective', 'Setup', 'Gameplay', 'Rules', 'Nick', '09/17/01', NULL, 2, 7),
(13, 'Snap', '52 card deck', 'Objective', 'Setup', 'Gameplay', 'Rules', 'Nick', '09/17/01', NULL, 2, 7),
(14, 'Six Card Golf', '52 card deck', 'Objective', 'Setup', 'Gameplay', 'Rules', 'Nick', '09/17/01', NULL, 2, 7);


-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `accessLevel` int(10) NOT NULL,
  `userGroup` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`accessLevel`, `userGroup`) VALUES
(1, 'Unregistered'),
(2, 'Logged In'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userAccessLevel` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `userAccessLevel`, `fname`, `lname`, `password`, `dob`) VALUES
(1, 'adminsayma', 'sayma@gmail.com', '3', 'Sayma', 'Haque', 'adminpass', '09/17/01'),
(2, 'adminapostolos', 'apostolos@gmail.com', '3', 'Apostolos', 'Lname', 'adminpass', '09/17/01'),
(3, 'admincarter', 'carter@ucalgary.ca', '3', 'Carter', 'Lname', 'adminpass', '09/17/01'),
(4, 'adminethan', 'ethan@ucalgary.ca', '3', 'Ethan', 'Lname', 'adminpass', '09/17/01'),
(5, 'adminjamie', 'jamie@gmail.com', '3', 'Jamie', 'Lname', 'adminpass', '09/17/01'),
(6, 'adminnick', 'nick@gmail.com', '3', 'Nick', 'Lname', 'adminpass', '09/17/01'),
(7, 'adminalex', 'alex@gmail.com', '3', 'Alex', 'Lname', 'adminpass', '09/17/01'),
(8, 'normaluser', 'mrnormal@gmail.com', '2', 'Guy', 'Normal', 'password', '09/17/01');

-- --------------------------------------------------------

--
-- Table structure for table `Favourite`
--

CREATE TABLE `Favourite` (
  `userID` int(10) NOT NULL,
  `entryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Favourite`
--

INSERT INTO `Favourite` (`userID`, `entryID`) VALUES
(1, 3),
(2, 5),
(3, 2);

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `CommentReply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wikiEntry`
--
ALTER TABLE `wikiEntry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`accessLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `CommentReply`
--
ALTER TABLE `CommentReply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Rating`
--
ALTER TABLE `Rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `wikiEntry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
