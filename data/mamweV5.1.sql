-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 16 juin 2023 à 11:30
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mamwe_jon`
--

-- --------------------------------------------------------

--
-- Structure de la table `mw_agenda`
--

DROP TABLE IF EXISTS `mw_agenda`;
CREATE TABLE IF NOT EXISTS `mw_agenda` (
  `mw_id_agenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_date_agenda` date NOT NULL,
  `mw_content_agenda` varchar(1000) NOT NULL,
  `mw_title_agenda` varchar(100) NOT NULL,
  `mw_picture_mw_id_picture` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mw_id_agenda`),
  KEY `fk_agenda_mw_picture1_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mw_article`
--

DROP TABLE IF EXISTS `mw_article`;
CREATE TABLE IF NOT EXISTS `mw_article` (
  `mw_id_article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_art` varchar(100) NOT NULL,
  `mw_content_art` text NOT NULL,
  `mw_visible_art` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0 COMMENT '1 = visbile 0 = invisble ',
  `mw_date_art` date NOT NULL DEFAULT current_timestamp(),
  `mw_section_mw_id_section` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_id_article`),
  KEY `fk_mw_article_mw_section1_idx` (`mw_section_mw_id_section`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_article`
--

INSERT INTO `mw_article` (`mw_id_article`, `mw_title_art`, `mw_content_art`, `mw_visible_art`, `mw_date_art`, `mw_section_mw_id_section`) VALUES
(1, 'Consultation préconceptionnelle', '*«J’aimerais un enfant...Nous aimerions agrandir notre famille...Mais sommes-nous prêts? Y a-t-il des examens à faire, des conseils à suivre, des questions à se poser, des voiles à lever...afin d’accueillir cet enfant dans les meilleures conditions qui soient?»*\\n\\n\r\n\r\nDe tout temps, dans les cultures différentes, des conseils sont donnés aux femmes avant de concevoir un enfant. L’ONE recommande ainsi aux personnes qui ont un projet d’enfant de consulter un professionnel formé à l’accompagnement préconceptionnel dans les mois qui précèdent la mise en route de la grossesse.\\n\r\nL’objectif de la consultation étant de dépister, évaluer, traiter si possible les situations présentant un risque potentiel pour une grossesse à venir par le biais d’un examen médical, d’un examen de laboratoire (prise de sang) et le cas échéant, par un travail en réseau avec de nombreux spécialistes(en ostéopathie, gynécologie, acupuncture, sexologie, endocrinologie, génétique, nutrition, kinésithérapie, …)\\n\r\nCe sera également l’occasion de vous informer sur de nombreux sujets: la fertilité, la nutrition, les types d’accompagnement de la grossesse, de la naissance et du post-partum qui existent en Belgique, …\\n\\n\r\n\r\n**_En pratique_**\\n\r\nPrévoir 2 séances d’une heure (sur rdv) à 2 semaines d’intervalle.', 0, '2023-05-24', 1),
(2, 'Hyperémèse gravidique ', '**_Vomissements incoercibles de la grossesse_** \\n\\n\r\n*La grossesse n’est pas une maladie… mais elle peut le devenir!*\\n\r\n*Ces vomissements qui ont fait de mes grossesses un enfer…*\r\n\r\nIl y a quelques années, après un test de grossesse, je me vois encore annoncer à ma collègue et amie sage-femme que j’avais choisie pour suivre ma grossesse «je suis enceinte… et je sens que ce sera une ligne droite pour moi!». Rapidement, je réaliserai que cela en sera tout autrement!\\n\r\nOn nous appelle les «vomisseuses» parfois encore, on ne se sent pas comprises, *(«si tu es déshydratée, on te réhydrate et puis on n’en parle plus»)* ni prises au sérieux *(«c’est psychologique: tu es certaine de vouloir cet enfant?»)*. Elle peut avoir des conséquences sur la qualité de vie tant personnelle que professionnelle et conduire à une détresse psychique profonde qui peut se prolonger dans le post-partum.\\n\r\nSi vous avez vécu ce cauchemar(et avez peur d’envisager une autre grossesse), que vous le vivez, ou que vous accompagnez quelqu’un qui le vit (je me rappelle de la détresse et le sentiment d’impuissance de mon conjoint), contactez-moi afin d’essayer de traverser ce cap dans les meilleures conditions qui soient. Parce qu’il y a des choses à faire!\\n\\n\r\n**_En pratique:_**\r\n\r\nMe contacter pour une prise de rdv\\n\r\nJe me déplace dans ce cas-là à domicile sur Bruxelles.\\n\r\n\r\nContacter l’asbl hyperémesis belgium: [https://www.facebook.com/Hyperemesis.be/?locale=fr_FR](https://www.facebook.com/Hyperemesis.be/?locale=fr_FR)\r\n\\n0487 67 84 35\r\n\\nhyperemesis@outlook.be\r\n', 0, '2023-05-24', 2),
(3, 'Hypnose et naissance', 'Régulièrement, lorsque je parle d’hypnose, beaucoup me voient comme ce fameux hypnotiseur canadien. Non ! je ne fais pas d’hypnose de spectacle en induisant un état de totale inconscience… qui fait peur à la plupart!\\n\r\nCeci dit, sachez que l’hypnose est un phénomène ordinaire qui survient chez chacun·e! Oui vous êtes régulièrement dans un état modifié de conscience (appelé transe)comme lorsque dans un train vous regardez le paysage et que vous laissez flotter le cours de vos pensées…\\n\r\nLa méthode Hypno-natal© à laquelle j’ai été formée, est issue de l’hypnose ericksonnienne et permet d’entrer activement dans cet état modifié de conscience afin d’avoir accès à nos ressources internes. Ces ressources sont toutes nos expériences passées, même celles que nous pensons avoir oubliées. Ce sont nos sentiments, nos émotions qui les accompagnaient et dont l’empreinte fidèle est conservée dans ce grand puits de connaissances. On y retrouve aussi tout ce qui fait l’expérience des hommes depuis la nuit des temps, ce que le psychanalyste Jung nommait «Inconscient collectif». Tel un guide intérieur, cet inconscient nous révèle à nous-mêmes et nous conduit vers un mieux-être.\\n\r\nUn enseignement et un entraînement sont toutefois nécessaires pour acquérir la maîtrise de nos ressources. Une fois enseignée, cette méthode permet d’être parfaitement autonome puisqu’elle peut se pratiquer seul (c’est l’autohypnose).\\n \r\nVéritable préparation psychique, Hypno-Natal® est basée sur la relaxation physique et mentale ainsi que sur des visualisations et des suggestions positives tout spécialement adaptées à l’état de grossesse et à l’accouchement. \\n\r\nGrâce à un état modifié de conscience qui favorise la communication intérieure avec soi-même (et si on le désire, avec son bébé), cette technique aide à vivre la grossesse le plus sereinement possible et à appréhender positivement l’accouchement.\\n\r\n Elle permet aux femmes de puiser en elles des trésors d’assurance personnelle afin d\'accoucher selon leur intuition et leurs désirs. \\n\r\nLes séances vous permettront de: \r\n•vous relaxer\r\n•stimuler votre énergie\r\n•profiter d\'un sommeil réparateur\r\n•développer votre assurance et votre intuition\r\n•soulager les maux de grossesse (vomissements, crampes, brûlant…)\r\n•augmenter les pensées positives et éloigner les pensées négatives\r\n•positiver votre accouchement\r\n•reconnaître vos capacités à accoucher\r\n•surmonter les éventuelles peurs et apaiser vos tensions\r\n•renforcer le sentiment d’être actrice de votre accouchement\r\n•apprendre à agir mentalement sur les éventuelles douleurs\r\n\r\n**_En pratique_**\r\nA votre demande, je peux orienter la préparation autour d’outils de l’hypnose. Durant chaque séance(nous déterminons ensemble le nombre de séance nécessaires pour vous), un thème particulier est abordé. Suivi, selon vos besoins, d’un entraînement d\'hypnose. \\n\r\nL’enregistrement des séances d’autohypnose, vous permettra, entre chaque séance d’approfondir votre capacité à vous détendre et à accéder à vos ressources. L’hypnose est un travail de motivation associé à un apprentissage qui exige une participation active de votre part. L’écoute répétitive des séances enregistrées vous permettra de renforcer les suggestions afin que votre organisme réagisse avec plus de fluidité et de facilité le jour J. \\n\r\nCette préparation est proposée en individuel (seule ou en couple).', 0, '2023-05-25', 2),
(4, 'Ma préparation à la naissance', 'Il n’est pas rare, au gré d’une conversation, qu’on me demande «pourquoi se préparer à la naissance? accoucher est naturel non? ne serait-ce pas une question de «mode»?\\n\r\nEn effet, accoucher est naturel… la plupart du temps, mais notre société occidentale n’assure plus cette préparation de façon informelle comme auparavant via la «tribu», les femmes de l’entourage. Les femmes ne bénéficient plus de façon informelle de cette expérience de la transmission vu notamment notre structure familiale dominante de famille nucléaire. Beaucoup de couples vivent d’ailleurs le post-partum dans la solitude… \\n\r\nSe préparer à la naissance doit donc s’organiser de façon plus formelle sous nos latitudes. C’est ainsi que, forte de mon expérience professionnelle et personnelle, je vous propose une préparation à la naissance et à la parentalité, selon vos besoins (nous n’avons pas les mêmes attentes/besoins après la première naissance qu’après la troisième!).\\n\r\nDès 20 semaines(4-5 mois), cette préparation vous permettra notamment de :\\n\r\n -Vous informer sur la physiologie de la grossesse, de la naissance, de l’allaitement et du post-partum\r\n-Remédier aux petits maux de la grossesse\r\n -Aborder différents sujets : devenir mère/ père, prendre soin de mon bébé (soins, alimentation, sommeil), comment me nourrir sainement, …\r\n-construire votre projet de grossesse et de naissance-...\\n\r\n\r\nJe m’appuie notamment sur les outils de [l’hypnose](lien avec la section hypnose) et de [la pleine conscience (minfdulness)](lien avec la section)\\n\r\n\r\n**_En pratique_**\\n\r\nJusqu’à 10 séances (selon vos besoins/attente) d’une heure\\n\r\nSur RDV', 0, '2023-05-25', 2),
(5, 'Pleine conscience et naissance', 'Selon la définition de Jon Kabat-Zinn, la pleine conscience (ou *mindfulness*) *est un état de conscience qui résulte du fait de porter son attention, intentionnellement, au moment présent, sans jugement, sur l’expérience qui se déploie moment après moment.*\\n\r\nCet état de conscience nécessite un entraînement afin de sortir du mode «faire –résolution de problèmes» et d’essayer d’entrer dans un mode «être» où on observe «simplement» ce qui se passe en nous: nos sensations physiques, nos émotions, nos pensées. Ce qui nous permet alors d’acquérir plus de liberté dans nos comportements.\\n\r\nLe programme \"naissance et parentalité en pleine conscience\" créé par Nancy Bardacke(MBCP: Mindful Based Birthing & Parenting) propose des outils pour se connecter à ses ressources et développer des aptitudes pour apprivoiser les vagues de la grossesse, de la naissance et de la vie en famille au quotidien. En effet, la plupart des préparations à la naissance se concentrent sur la grossesse et l’accouchement. Évidemment, cette étape cruciale, pleine d’inconnues et parfois douloureuse, nécessite d’être bien préparée mais il ne faut pas négliger l’étape d’après: après la naissance, quand le bébé est là…\\n\r\n\r\n**_En pratique:_**\\n\r\nCette préparation à la naissance et à la parentalité par la pleine conscience se fait\\n\r\n-_soit en groupe:_ sous forme de cycle de plusieurs séances ou sous forme de WE intensif(je co-anime alors les groupes)\\n\r\nPour plus d’informations: \\n[https://www.emergences.org/evements_pour_la_categorie/cycles-naissance-parentalite-et-pleine-conscience](https://www.emergences.org/evements_pour_la_categorie/cycles-naissance-parentalite-et-pleine-conscience)\\n\r\n-_soit en individuel:_\\n\r\nÀ votre demande, nous pouvons aborder la préparation à la naissance sous forme de séances basées sur la méditation de pleine conscience. \\n\r\nSur RDV', 0, '2023-05-25', 2),
(6, 'Yoga prénatal', 'Le yoga est une discipline d’origine indienne qui a pour vocation d’harmoniser corps et esprit et qui relève ainsi plus d’une hygiène de vie que d’une activité physique.\\n\r\nIl existe plusieurs types de yoga, j’ai été formée au yoga du Cachemire qui est un yoga «doux» centré sur les sensations dans le présent...et là, vous saisissez le lien avec [la pleine conscience](lien)!;-)\\n\r\nDans ce cours de yoga prénatal, je choisis des postures (*asanas*), des exercices d’attention au souffle (*pranayamas*) et des relaxations qui répondent aux besoins spécifiques de la femme enceinte.\\n\r\nCe moment de pause entre femmes permet de pallier à certains maux de la grossesse, de devenir plus conscientes de notre corps et de notre mental, de nous garder en mouvement tout en nous préparant physiquement et psychiquement à l’accouchement. \\n\\n\r\n_En pratique:_\\n\r\nEn groupe (peut se faire en individuel)\\n\r\nVenir avec une tenue confortable, sa gourde d’eau et son tapis de yoga (optionnel)', 0, '2023-05-24', 2),
(7, 'Ateliers «Mon bébé signe»', 'Je suis touchée par le nombre de parents (et j’en ai fait partie) qui galèrent avec les «problèmes» de sommeil de leur bébé! il est courant que plusieurs recettes contradictoires leur aient été proposées pour qu’il «fasse ses nuits», pour ne pas en faire «un Tanguy», pour ne pas «lui donner de mauvaises habitudes», pour ne pas se faire «avoir» par son bébé manipulateur...faisant fi des causes peut-être médicales, émotionnelles, sociétales, … à la source de ces difficultés. Il faut déblayer tout cela avant d’envisager par exemple une «méthode» de sevrage parental.\\n\r\nForte de mon expérience et de ma formation spécifique (bébé jusqu’à 24 mois), je peux vous aider à trouver votre façon de soutenir votre enfant dans la mise en place progressive de ses rythmes et de son sommeil. \\n\r\n\r\n\\n **_En pratique_**\\n\r\n2 à 3 séances d’une heure à 3 semaines d’intervalle (minimum).\\n\r\nEn individuel (si possible avec bébé)\\n\\n\\n\r\n\r\nParce que tous les parents posent tôt ou tard des questions sur le sommeil de leur bébé/bambin à Parce que des recettes contradictoires circulent sans tenir compte des spécificités de chaque bébé, de chaque famille, ni de l’âge du bébé, ni des facteurs de perturbation du sommeil. à Parce qu’il est important de s’outiller avec des bases solides –physiologie, rôle du sommeil, évolution, et avec une démarche de soin qui permette de mener un entretien avec les parents : ainsi chaque famille trouve sa façon de soutenir leur(s) enfant(s) dans la mise en place progressive de ses/leurs rythmes et de son/leur sommeil.', 0, '2023-05-24', 3),
(8, 'Massage bébé', 'Le toucher est le premier sens par lequel votre bébé entre en contact avec le monde. Le massage lui permet également de stimuler, renforcer et régulariser ses différents systèmes: circulatoire, respiratoire, gastro-intestinal, musculaire, immunitaire, nerveux… Il l’aide à prendre conscience de son enveloppe corporelle, apporte de la détente, du bien-être et certains mouvements peuvent soulager des tensions et petits malaises (coliques, poussées dentaires par exemple)\\n\r\nMais aussi et surtout, il favorise le lien d\'attachement et renforce la relation parent-enfant. Il sera d\'autant plus utile lorsque le lien a été interrompu ou bousculé (accouchement difficile, prématurité, sevrage, placement,...).\\n\\n\r\n\r\n**_En pratique_**\r\nDès 2 mois, une séance individuelle (co-parent, grand-parent, nounou, marraine, parrain… sont les bienvenus!) d’une heure (selon la disponibilité de votre bébé).\\n Veuillez vous munir de deux essuies et d’une bonne huile végétale BIO neutre(huile d’amande douce ou huile de pépins de raisins par exemple).', 0, '2023-05-24', 3),
(9, 'Le soin rebozo', 'Ce soin ancestral permet de marquer, célébrer une étape clé de la vie d’une femme: premières règles, mariage, accouchement, ménopause, devenir grand-mère, deuils (fausse-couche, séparation...),changement de job, déménagement,... ou de simplement faire une pause, prendre du recul sur un projet, recharger ses batteries, s’offrir un temps pour soi...\\n\r\n**«Ce temps de soin est un rituel de passage d’un état à un autre : fermeture de l’ancien vers une ouverture à un nouveau. Il marque un passage, une étape à franchir, celui d’une ouverture à soi-même, en tant que femme» **[(www.lerebozo.fr)](www.lerebozo.fr)\\n\\n\r\n\r\n_**En pratique**_\\n\r\nJe donne ce soin rituel avec ma complice dans une ambiance de douceur, d’écoute et de bienveillance. Il dure 2h30 à 3h et comporte 3 phases successives:\\n\r\n-massage à 4 mains\\n\r\n-bain vapeur\\n\r\n-resserrage du corps avec le rebozo (écharpe)\\n\r\nSur RDV\r\n\\n\r\nRemarque: ce soin peut être offert sous forme de chèque-cadeau!', 0, '2023-05-25', 3),
(10, 'Le sommeil de bébé', 'Je suis touchée par le nombre de parents (et j’en ai fait partie) qui galèrent avec les «problèmes» de sommeil de leur bébé! il est courant que plusieurs recettes contradictoires leur aient été proposées pour qu’il «fasse ses nuits», pour ne pas en faire «un Tanguy», pour ne pas «lui donner de mauvaises habitudes», pour ne pas se faire «avoir» par son bébé manipulateur...faisant fi des causes peut-être médicales, émotionnelles, sociétales, … à la source de ces difficultés. Il faut déblayer tout cela avant d’envisager par exemple une «méthode» de sevrage parental.\\n\r\nForte de mon expérience et de ma formation spécifique (bébé jusqu’à 24 mois), je peux vous aider à trouver votre façon de soutenir votre enfant dans la mise en place progressive de ses rythmes et de son sommeil. \\n\r\n\r\n\\n **_En pratique_**\\n\r\n2 à 3 séances d’une heure à 3 semaines d’intervalle (minimum).\\n\r\nEn individuel (si possible avec béb)\\n\\n\\n\r\n\r\nàParce que tous les parents posent tôt ou tard des questions sur le sommeil de leur bébé/bambin à Parce que des recettes contradictoires circulent sans tenir compte des spécificités de chaque bébé, de chaque famille, ni de l’âge du bébé, ni des facteurs de perturbation du sommeil. à Parce qu’il est important de s’outiller avec des bases solides –physiologie, rôle du sommeil, évolution, et avec une démarche de soin qui permette de mener un entretien avec les parents : ainsi chaque famille trouve sa façon de soutenir leur(s) enfant(s) dans la mise en place progressive de ses/leurs rythmes et de son/leur sommeil.', 0, '2023-05-25', 3),
(11, 'Yoga post-natal', 'Les bienfaits du yoga, nous l’avons vu (lien avec la section yoga prénatal)ne sont plus à démontrer.\\n\r\nAprès la naissance de votre enfant, dans cette phase délicate du post-partum, peut-être aurez-vous besoin de bouger, de vous réapproprier votre corps en douceur, ou tout simplement de vous octroyer un temps de pause du corps et de l’esprit… entre femmes!\\n\\n\r\n\r\n**_En pratique_**\r\nAccompagnée ou non de votre bébé (jusqu’à 6 mois)\\n\r\nEn groupe ou en individuel\\n\r\nUne séance dure une heure\\n\r\nSur rdv', 0, '2023-05-25', 3),
(12, 'Soins d\'urgence', '', 1, '2023-05-25', 3),
(13, 'Sevrage / Diversification', '', 1, '2023-05-25', 3),
(14, 'Contraception', '', 1, '2023-05-25', 3);

-- --------------------------------------------------------

--
-- Structure de la table `mw_category_ressource`
--

DROP TABLE IF EXISTS `mw_category_ressource`;
CREATE TABLE IF NOT EXISTS `mw_category_ressource` (
  `mw_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_category_title` varchar(111) NOT NULL,
  PRIMARY KEY (`mw_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_category_ressource`
--

INSERT INTO `mw_category_ressource` (`mw_category_id`, `mw_category_title`) VALUES
(1, 'Allaitement'),
(2, 'Cadre légal et scientifique'),
(3, 'Grossesse et accouchement'),
(4, 'Hyperémèse gravidique'),
(5, 'Hypnose'),
(6, 'Parentalité/ Éducation'),
(7, 'Pleine conscience'),
(8, 'Post-partum'),
(9, 'Préconception'),
(10, 'Se soigner naturellement'),
(11, 'Sommeil de bébé'),
(12, 'Yoga périnatal');

-- --------------------------------------------------------

--
-- Structure de la table `mw_homepage`
--

DROP TABLE IF EXISTS `mw_homepage`;
CREATE TABLE IF NOT EXISTS `mw_homepage` (
  `mw_id_homepage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_content_homepage` text NOT NULL,
  `mw_date_homepage` date NOT NULL DEFAULT current_timestamp(),
  `mw_picture_mw_id_picture` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_id_homepage`),
  KEY `fk_mw_homepage_mw_picture_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_homepage`
--

INSERT INTO `mw_homepage` (`mw_id_homepage`, `mw_content_homepage`, `mw_date_homepage`, `mw_picture_mw_id_picture`) VALUES
(1, '*Une sage-femme vous accompagne*\\n\r\nJe m’appelle Faouzia Ismaili, je suis maman de 2 enfants et sage-femme depuis près de 30 ans.\\n\r\nJ’ai commencé ma carrière dans le milieu hospitalier tout en me formant parallèlement dans l’enseignement. Et je suis d’ailleurs encore enseignante depuis plus de 20 ans… J’aime transmettre… \\n J’ai cocréé en passant une association de sages-femmes à Bruxelles et ai débuté mon activité en tant qu’indépendante. Assoiffée d’apprentissages et de découvertes, je me suis attelée de formation en formation à devenir la plus belle version professionnelle (mais pas que!) de moi-même.\\n\r\nEt puis, les tsunamis de la grossesse d’abord, de la parentalité ensuite, m’ont emportée!\\n\r\nMes enfants sont devenus des ados (une autre facette de la parentalité que je déguste, si vous voyez ce que je veux dire;-), et quand je regarde en arrière, je me dis qu’il y a vraiment un «avant» et un «après». Et que c’est cette transition particulièrement que je souhaite accompagner de tout mon cœur. Elle donne sens à mon métier, c’est ma façon à moi de changer le monde. Depuis ce tsunami donc, les prouesses techniques («faire» des accouchements, des prises de sang, des consultations médicales,…) ne sont pus mes priorités (la sage-femme qui devient sage me direz-vous!), elles sont devancées de loin par mon désir profond d’accompagner les parents dans cette période si fragile et si importante (oserais-je dire «si sacrée») qu’est la naissance d’une famille.\\n\r\nJe continue donc à me former dans ce sens et ai choisi de me consacrer à «l’avant» et «l’après» (je n’assiste plus aux accouchements) en proposant des services axés sur «l’être» plus que sur le «faire». Mais rassurez-vous: tout ce qu’il y a de plus scientifique au rendez-vous!', '2023-06-16', 29),
(2, '', '2023-06-16', 4);

-- --------------------------------------------------------

--
-- Structure de la table `mw_info`
--

DROP TABLE IF EXISTS `mw_info`;
CREATE TABLE IF NOT EXISTS `mw_info` (
  `mw_id_info` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_content_info` text NOT NULL,
  `mw_date_info` date NOT NULL DEFAULT current_timestamp(),
  `mw_picture_mw_id_picture` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_id_info`),
  KEY `fk_mw_info_mw_picture1_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mw_livredor`
--

DROP TABLE IF EXISTS `mw_livredor`;
CREATE TABLE IF NOT EXISTS `mw_livredor` (
  `mw_id_livredor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_name_livredor` varchar(100) NOT NULL,
  `mw_mail_livredor` varchar(100) NOT NULL DEFAULT '0' COMMENT '1 = visible 0 = invisbile ',
  `mw_message_livredor` text NOT NULL,
  `mw_date_livredor` date NOT NULL DEFAULT current_timestamp(),
  `mw_visibility_livredor` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = visible 0 = invislbe 2 = userban',
  PRIMARY KEY (`mw_id_livredor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mw_patient`
--

DROP TABLE IF EXISTS `mw_patient`;
CREATE TABLE IF NOT EXISTS `mw_patient` (
  `mw_id_patient` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_name_patient` varchar(100) NOT NULL,
  `mw_surename_patient` varchar(100) NOT NULL,
  `mw_birthdate_patient` date NOT NULL,
  `mw_mail_patient` varchar(45) NOT NULL,
  `mw_phone_patient` int(11) NOT NULL,
  PRIMARY KEY (`mw_id_patient`),
  UNIQUE KEY `mw_nom_mail_UNIQUE` (`mw_mail_patient`),
  UNIQUE KEY `mw_nom_gsm_UNIQUE` (`mw_phone_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mw_picture`
--

DROP TABLE IF EXISTS `mw_picture`;
CREATE TABLE IF NOT EXISTS `mw_picture` (
  `mw_id_picture` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_picture` varchar(100) DEFAULT NULL,
  `mw_url_picture` varchar(150) NOT NULL,
  `mw_size_picture` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = visible 0 = invisble ',
  `mw_position_picture` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = droite 0 = gauche',
  `mw_article_mw_id_article` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mw_id_picture`),
  UNIQUE KEY `mw_url_picture_UNIQUE` (`mw_url_picture`),
  UNIQUE KEY `mw_title_picture_UNIQUE` (`mw_title_picture`),
  KEY `fk_mw_picture_mw_article1_idx` (`mw_article_mw_id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_picture`
--

INSERT INTO `mw_picture` (`mw_id_picture`, `mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`, `mw_article_mw_id_article`) VALUES
(1, 'mon bb signe.JPG', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/ateliers%20mon%20BB%20signe?dl=0&preview=mon+bb+signe.JPG&subfolder_nav_tracking=1', 1, 1, 7),
(4, '20230524_105222.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/consultation%20pr%C3%A9conceptionnelle?dl=0&preview=20230524_105222.jpg&subfolder_nav_tracking=1', 1, 1, 1),
(5, 'woman-therapy-session-attentive-psychologist-attentive-psychologist-holding-pencil-her-hands-making-written-notes-while-listening-her-client.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/consultation%20pr%C3%A9conceptionnelle?dl=0&preview=woman-therapy-session-attentive-psychologist-attentive-psychologist-holding-pencil-her-hands-making-written-notes-while-listening-her-client.jpg&subfolder_nav_tracking=1', 1, 1, 1),
(6, 'dessine-moi une famille.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/consultation%20pr%C3%A9conceptionnelle?dl=0&preview=dessine-moi+une+famille.jpg&subfolder_nav_tracking=1', 1, 1, 1),
(7, 'pexels-andrea-piacquad…582.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/hyper%C3%A9m%C3%A8se%20gravidique?dl=0&preview=pexels-andrea-piacquadio-3768582.jpg&subfolder_nav_tracking=1', 1, 1, 2),
(8, 'pexels-mart-production-8458850.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/hyper%C3%A9m%C3%A8se%20gravidique?dl=0&preview=pexels-mart-production-8458850.jpg&subfolder_nav_tracking=1', 1, 1, 2),
(9, 'hypnose.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/hypnose?dl=0&preview=hypnose.jpg&subfolder_nav_tracking=1', 1, 1, 3),
(10, 'young-girl-talking-therapist-side-view.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/hypnose?dl=0&preview=young-girl-talking-therapist-side-view.jpg&subfolder_nav_tracking=1', 1, 1, 3),
(11, 'Fotolia_13623324_S.jpg\r\n\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/massage%20BB?dl=0&preview=Fotolia_13623324_S.jpg&subfolder_nav_tracking=1', 1, 1, 8),
(12, 'massage bb.JPG', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/massage%20BB?dl=0&preview=massage+bb.JPG&subfolder_nav_tracking=1', 1, 1, 8),
(13, 'massage bb2.JPG', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/massage BB?dl=0&preview=massage+bb2.JPG&subfolder_nav_tracking=1', 1, 1, 8),
(29, 'bb.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/accueil?dl=0&preview=bb.jpg&subfolder_nav_tracking=1', 1, 1, NULL),
(30, 'pexels-daisy-laparra-826734.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/accueil?dl=0&preview=pexels-daisy-laparra-826734.jpg&subfolder_nav_tracking=1', 1, 1, NULL),
(31, '20230524_105244.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/contact?dl=0&preview=20230524_105244.jpg&subfolder_nav_tracking=1', 1, 1, NULL),
(32, 'Fotolia_2702211_S.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/pr%C3%A9paration%20%C3%A0%20la%20naissance?dl=0&preview=Fotolia_2702211_S.jpg&subfolder_nav_tracking=1', 1, 1, 4),
(33, 'Fotolia_41654364_XS.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/pr%C3%A9paration%20%C3%A0%20la%20naissance?dl=0&preview=Fotolia_41654364_XS.jpg&subfolder_nav_tracking=1', 1, 1, 4),
(34, 'Fotolia_42579545_XS.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/pr%C3%A9paration%20%C3%A0%20la%20naissance?dl=0&preview=Fotolia_42579545_XS.jpg&subfolder_nav_tracking=1', 1, 1, 4),
(35, 'groupe-sportifs-dans-ex…vre.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/pleine%20conscience?dl=0&preview=groupe-sportifs-dans-exercice-du-cadavre.jpg&subfolder_nav_tracking=1', 1, 1, 5),
(36, 'pexels-cliff-booth-4057865.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/pleine%20conscience?dl=0&preview=pexels-cliff-booth-4057865.jpg&subfolder_nav_tracking=1', 1, 1, 5),
(37, 'pexels-mikhail-nilov-6707489.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/pleine%20conscience?dl=0&preview=pexels-mikhail-nilov-6707489.jpg&subfolder_nav_tracking=1', 1, 1, 5),
(38, 'Fotolia_40150060_XS.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/soin%20rebozzo?dl=0&preview=Fotolia_40150060_XS.jpg&subfolder_nav_tracking=1', 1, 1, 9),
(39, 'massage-therapy-g005d0d050_1280.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/soin%20rebozzo?dl=0&preview=massage-therapy-g005d0d050_1280.jpg&subfolder_nav_tracking=1', 1, 1, 9),
(40, 'rebozo.jpeg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/soin%20rebozzo?dl=0&preview=rebozo.jpeg&subfolder_nav_tracking=1', 1, 1, 9),
(41, 'pexels-antoni-shkraba-6…675.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/sommeil%20BB?dl=0&preview=pexels-antoni-shkraba-6134675.jpg&subfolder_nav_tracking=1', 1, 1, 10),
(42, 'pexels-laura-garcia-3963711.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/sommeil%20BB?dl=0&preview=pexels-laura-garcia-3963711.jpg&subfolder_nav_tracking=1', 1, 1, 10),
(43, 'pexels-william-fortunato-6392901.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/sommeil%20BB?dl=0&preview=pexels-william-fortunato-6392901.jpg&subfolder_nav_tracking=1', 1, 1, 10),
(44, 'pexels-william-fortunato-6392926.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/sommeil%20BB?dl=0&preview=pexels-william-fortunato-6392926.jpg&subfolder_nav_tracking=1', 1, 1, 10),
(45, 'pexels-william-fortunato-6393346.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/sommeil%20BB?dl=0&preview=pexels-william-fortunato-6393346.jpg&subfolder_nav_tracking=1', 1, 1, 10),
(46, 'cours collectif.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/yoga?dl=0&preview=cours+collectif.jpg&subfolder_nav_tracking=1', 1, 1, 6),
(47, 'jeune-femme-enceinte-faisant-du-yoga-prenatal-courbe-laterale-janu-sirsasana-pose.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/yoga?dl=0&preview=jeune-femme-enceinte-faisant-du-yoga-prenatal-courbe-laterale-janu-sirsasana-pose.jpg&subfolder_nav_tracking=1', 1, 1, 6),
(48, 'l\'arbre.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/yoga?dl=0&preview=l%27arbre.jpg&subfolder_nav_tracking=1', 1, 1, 6),
(49, 'vue-cote-femme-enceinte-faire-yoga-interieur.jpg\r\n', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/yoga?dl=0&preview=vue-cote-femme-enceinte-faire-yoga-interieur.jpg&subfolder_nav_tracking=1', 1, 1, 6),
(50, 'mother-with-her-baby-d… (1).jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/yoga/yoga%20post?dl=0&preview=mother-with-her-baby-daughter-practice-yoga-home+(1).jpg&subfolder_nav_tracking=1', 1, 1, 11),
(51, 'mother-with-little-baby-boy-practice-yoga.jpg', 'https://www.dropbox.com/scl/fo/4ekp72mmog7cun5cjd3yb/h/photos/yoga/yoga post?dl=0&preview=mother-with-little-baby-boy-practice-yoga.jpg&subfolder_nav_tracking=1', 1, 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `mw_ressources`
--

DROP TABLE IF EXISTS `mw_ressources`;
CREATE TABLE IF NOT EXISTS `mw_ressources` (
  `mw_id_ressource` int(11) NOT NULL AUTO_INCREMENT,
  `mw_title_ressource` varchar(255) NOT NULL,
  `mw_content_ressource` text NOT NULL,
  `mw_url_ressource` varchar(255) DEFAULT NULL,
  `mw_date_ressource` date DEFAULT current_timestamp(),
  `mw_sub_category_ressource_mw_id_sub_category_ressource` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_id_ressource`,`mw_sub_category_ressource_mw_id_sub_category_ressource`),
  KEY `fk_mw_ressources_mw_sub_category_ressource1_idx` (`mw_sub_category_ressource_mw_id_sub_category_ressource`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_ressources`
--

INSERT INTO `mw_ressources` (`mw_id_ressource`, `mw_title_ressource`, `mw_content_ressource`, `mw_url_ressource`, `mw_date_ressource`, `mw_sub_category_ressource_mw_id_sub_category_ressource`) VALUES
(1, 'Le guide de l\'allaitement naturel ', 'Ina May Gaskin', NULL, '2012-03-01', 1),
(2, 'Manuel très illustré de l\'allaitement ', 'Caroline Guillot', NULL, '2022-12-16', 1),
(3, 'L\'allaitement, de la naissance au sevrage  ', 'Dr Marie Thirion', NULL, '2023-01-25', 1),
(4, 'infor-allaitement.be', 'Association sans but lucratif qui a pour objet de promouvoir l\'information et d\'assurer le soutien dans le domaine de l\'allaitement auprès des futurs parents, des mères allaitantes et du personnel de santé. L\'équipe est constituée de femmes bénévoles ayant allaité et ayant suivi des formations spécifiques en allaitement maternel et à l\'écoute. ', 'www.infor-allaitement.be', '2023-06-16', 2),
(5, 'La Leche League - lllbelgique.org', 'La Leche League est une association internationale de soutien à l’allaitement maternel.', 'https://lllbelgique.org/', '2023-06-16', 2),
(6, 'Union professionnelle des sages-femmes belges', 'site de l’union professionnelle des sages-femmes belges qui présente de nombreuses ressources pour les parents : démarches administratives et formalités, législation (dont les recommandations de bonne pratique en périnatalité), les prestations des sages-femmes.', 'https://sage-femme.be/parents-old/parents_ressources-pratiques/  ', '2023-06-16', 2),
(7, 'Birthmatters.be ', 'Birthmatters.be est un guide des choix à faire durant la grossesse, la naissance, la maternité, … Il présente les possibilités qui existent en matière de soins à la naissance et aide à y voir plus clair.', 'https://www.birthmatters.be/?lang=fr', '2023-06-16', 2),
(8, 'Evidence Based Birth', 'information aux parents sur les dernières études en matière de périnatalité (induction, …)', 'https://evidencebasedbirth.com/', '2023-06-16', 2),
(9, 'Le premier Cri', 'Gilles de Maistre', NULL, '2007-10-31', 3),
(10, 'Le guide de la naissance naturelle ', 'Ina May Gaskin', NULL, '2012-03-22', 1),
(11, 'Une naissance heureuse : bien vivre sa grossesse et son accouchement', 'Isabelle Brabant', NULL, '2013-04-12', 1),
(12, 'Césariennes, questions, effets, enjeux ', 'Michel Odent', NULL, '2020-05-29', 1),
(13, 'La Naissance en BD (tomes 1 et 2) ', 'Lucile Gomez', NULL, '2021-11-26', 1),
(14, 'J\'accouche bientôt - Que faire de la douleur ? ', 'Maïtie Trélaün', NULL, '2012-04-20', 1),
(15, 'Nées en conscience', 'Nées en conscience est un podcast offrant des récits de naissances émouvants et authentiques. Idéal à écouter si vous êtes enceinte et que vous cherchez à vous réassurer dans vos capacités à accueillir votre bébé par vous-même, avec force et confiance. (Cécile Tigoulet)', 'https://podcasts.apple.com/be/podcast/n%C3%A9es-en-conscience/id1566398758', '2023-04-08', 4),
(16, 'Bliss Stories', 'C’est le 1er PODCAST où l’on parle de maternité sans filtre (Clémentine Galey)', 'https://bliss-stories.fr/le-podcast-bliss-stories-maternite-sans-filtre/ ', '2023-06-16', 4),
(17, 'hyperemesis.org', 'site de référence en la matière (en anglais)', 'https://www.hyperemesis.org/ ', '2023-06-16', 2),
(18, 'Hyperemesis Belgium ', 'Hyperemesis est une ASBL souhaitant venir en aide aux femmes atteintes d\'hyperémèse gravidique en leur apportant l\'accompagnement nécessaire afin de faciliter leur quotidien pendant leur grossesse compliquée. Nous avons également un but informatif.', 'https://www.facebook.com/Hyperemesis.be/?locale=fr_FR', '2023-06-16', 2),
(19, 'la méthode hypnonatal® et le cahier zen de la future maman', 'Lise Bartoli', NULL, '2013-10-02', 1),
(20, 'HypnoNaissance® : la méthode Mongan ', 'Marie F. Mongan', NULL, '2022-06-09', 1),
(21, 'Pas à Pas : Guide d\'auto-préparation à l\'accouchement par l\'hypnose', 'Armelle Touyarot', NULL, '2009-07-15', 1),
(22, 'Même qu’on naît imbattables ', 'Marion Cuerq', NULL, '2018-03-15', 3),
(23, '5 piliers pour une vie de famille épanouie', 'Jesper Juul', NULL, '2019-08-21', 1),
(24, 'Me voilà ! Qui es-tu ? - Sur la proximité, le respect et les limites entre adultes et enfants', 'Jesper Juul', NULL, '2015-03-12', 1),
(25, 'Le bébé est un mammifère', 'Michel Odent', NULL, '2014-04-01', 1),
(26, 'Tu seras une mère féministe ! manuel d’émancipation pour des maternités décomplexées et libérées', 'Aurélia Blanc', NULL, '2022-09-21', 1),
(27, 'Mamas (déconstruction de l’instinct maternel)', 'Lily Sohn', NULL, '2019-09-11', 1),
(28, 'Culpabilité ta mère ! (Maternage décomplexé)', 'Ophélie Bourgeois', NULL, '2021-03-23', 1),
(29, 'Journal de bord d’une maternité décomplexée – soyez la mère que vous voulez ', 'Déborah Laurent', NULL, '0202-07-16', 1),
(30, 'À l’écoute de mon bébé ', 'Aletha Solther', NULL, '2019-02-19', 1),
(31, 'Jalousies et rivalités entre frères et sœurs ', 'Adele Faber, Elaine Mazlish', NULL, '2003-09-17', 1),
(32, 'Parler pour que les enfants écoutent, écouter pour que les enfants parlent', 'Adele Faber, Elaine Mazlish', NULL, '2012-10-12', 1),
(33, 'Le cerveau de votre enfant ', 'Daniel J. Siegel, Tina Payne Bryson', NULL, '2015-05-06', 1),
(34, 'La discipline sans drame ', 'Daniel J. Siegel, Tina Payne Bryson', NULL, '2019-01-02', 1),
(35, 'Le cerveau de l’enfant expliqué aux parents', 'Alvaro Bilbao', NULL, '2019-03-13', 1),
(36, 'Premiers mois avec bébé, libérez-vous des idées reçues', 'Emily Oster\\n (de la naissance à 3 ans : allaitement, sommeil, apprentissage de la propreté, acquisition du langage, …)', '', '2020-06-05', 1),
(39, 'Pour une enfance heureuse ', 'Dr Catherine Gueguen', NULL, '2015-03-19', 1),
(40, 'vivre heureux avec son enfant ', 'Dr Catherine Gueguen', NULL, '2017-01-19', 1),
(41, 'Comprendre et éduquer son enfant ', 'Isabelle Filliozat', NULL, '2022-05-04', 1),
(42, 'au cœur des émotions de l’enfant ', 'Isabelle Filliozat', NULL, '2019-01-02', 1),
(43, 'Il n’y a pas de parent parfait', 'Isabelle Filliozat', NULL, '2019-04-24', 1),
(44, 'Le manuel de survie des parents : décrypter et accompagner l’enfant de 0 à 6 ans ', 'Héloïse Junier', NULL, '2022-04-27', 1),
(45, 'Pour ou contre : les grands débats de la petite enfance à la lumière des connaissances scientifiques', 'Héloïse Junier', NULL, '2021-10-13', 1),
(46, 'La Matrescence ', '', 'http://clementinesarlat.com/podcasts/la-matrescence/', '2023-06-16', 4),
(47, 'Histoires de darons ', '(paternité)', 'https://www.darons.fr/ ', '2023-06-12', 4),
(48, 'la philosophie du bébé', 'Les chemins de la philosophie (France culture) :  4 épisodes', 'https://www.radiofrance.fr/franceculture/podcasts/serie-philosophie-du-bebe', '2023-01-24', 4),
(49, 'Un podcast à soi ', 'les questions de genre et féminisme', 'https://www.arteradio.com/emission/un_podcast_soi/1092', '2023-06-16', 4),
(50, 'Parents conscients', 'Soutien des parents, des familles et des professionnels afin de trouver un angle de vue différent, une aide, une posture, un savoir-faire et un savoir-être applicables afin d’obtenir des solutions réalistes et concrètes aux problèmes rencontrés au sein des familles, des fratries, des couples et des institutions.', 'https://parentsconscients.be/', '2023-06-16', 2),
(51, 'signeavecmoi.com', 'site de Nathanaëlle Bouhier-Charles et Monica Companys, créatrices du concept du langage gestuelle pour les bébés en France.', 'www.signeavecmoi.com', '2023-06-16', 2),
(52, 'familylab.fr', 'L’association vise à promouvoir à travers le monde les valeurs et la pensée suggérée par Jesper Juul pour des relations familiales saines et constructives.', 'https://www.familylab.fr/', '2023-06-16', 2),
(53, 'naitre et grandir', 'Naître et grandir est un site internet et un magazine québécois sans but lucratif destinés particulièrement aux futurs parents et parents d’enfants de 0 à 8 ans.', 'https://naitreetgrandir.com/fr', '2023-06-16', 2),
(54, 'Emergences', 'Centre à Bruxelles qui organise de multiples activités autour de la pleine conscience dont les ateliers de préparation à la naissance que je coanime avec mon amie Caroline Lesire.', 'https://www.emergences.org/  ', '2023-06-16', 2),
(55, 'Je me prépare à la naissance en pleine conscience', 'Faouzia Ismaili et Caroline Lesire', NULL, '2018-02-13', 1),
(56, 'Où tu vas, tu es', 'Jon Kabat-Zinn', NULL, '2013-03-02', 1),
(57, 'Se préparer à la naissance en pleine conscience', 'Nancy Bardacke', NULL, '2022-05-19', 1),
(58, 'Méditer jour après jour', 'Christophe André', NULL, '2011-10-06', 1),
(59, 'Etre parent en pleine conscience', 'Myla et Jon Kabat-Zinn', NULL, '2015-02-19', 1),
(60, 'Le Mois d\'or ', 'Céline Chadelat, Marie Mahé-Poulin', NULL, '2021-02-03', 1),
(61, 'Vivre sereinement son 4ème trimestre de grossesse', 'Céline Bazin', NULL, '2021-01-06', 1),
(62, 'Le quatrième trimestre de la grossesse ', 'Ingrid Bayot', NULL, '2018-01-02', 1),
(63, 'Ceci est notre post-partum- défaire les mythes et les tabous pour s’émanciper', 'Illana Weizman', NULL, '2021-01-20', 1),
(64, 'Post-partum, paroles de mères : pour en finir avec les tabous ', 'Réjane Ereau, témoignages', NULL, '2021-09-21', 1),
(65, 'Dépression post-partum, la face cachée de la maternité', 'Chloé Bedouet et Elise Marcende', NULL, '2023-01-04', 1),
(66, 'Les secrets du post-partum- 50 questions/réponses pour adoucir son quatrième trimestre', 'Sophie Baconin', NULL, '2021-08-31', 1),
(67, 'La vie rêvée du post-partum et Le post-partum dure 3 ans', 'Anna Roy', NULL, '2021-04-07', 1),
(68, 'Le guide anti-toxique de la grossesse', 'Dr Laurent Chevallier', NULL, '2017-01-04', 1),
(69, 'Mon projet bébé, les secrets de l’ayurveda pour booster sa fertilité et préparer sa grossesse', 'Amélie Clergue Vaurès', NULL, '2022-01-12', 1),
(70, 'Babies', 'Netflix ', NULL, '2020-01-01', 3),
(71, 'De la naissance aux premiers pas.', 'Michèle Forestier', NULL, '2018-11-01', 1),
(72, 'Le bébé en mouvement : savoir accompagner son développement psychomoteur', 'Lucie Meunier', NULL, '2019-08-12', 1),
(73, 'O.N.E.', 'L’Office de la Naissance et de l’Enfance est l’organisme de référence de la Communauté française pour toutes les questions relatives à l’enfance, aux politiques de l’enfance, à la protection de la mère, au soutien à la parentalité et à l’accueil de l’enfant.', 'www.one.be', '2023-06-16', 2),
(74, 'Réseau Morphée - Le sommeil de 0 à 18 ans', '', 'https://sommeilenfant.reseau-morphee.fr/qui-sommes-nous/comite-scientifique/', '2023-06-16', 2),
(75, 'Le guide de l\'homéopathie familiale  ', 'Antoine Demonceaux, Rachel Frély, Alain Tardif', NULL, '2019-10-18', 1),
(76, 'Soigner ses enfants avec les huiles essentielles et Quelles huiles essentielles pendant ma grossesse ', 'Danièle Festy', NULL, '2009-05-04', 1),
(77, 'Les recettes du 4ème trimestre au naturel et Bien vivre le 4ème trimestre au naturel ', 'Julia Simon', NULL, '2019-09-19', 1),
(78, 'Guide de soins naturels pour la famille et accueillir mon enfant naturellement', 'Céline Arsenault', NULL, '2015-09-01', 1),
(79, 'Dormir sans larmes ', 'Dr Rosa Jové', NULL, '2017-04-19', 1),
(80, 'Le sommeil du jeune enfant ', 'Héloïse Junier', NULL, '2022-04-27', 1),
(81, 'Le sommeil du tout petit', 'Dr MJ Challamel', NULL, '2020-11-19', 1),
(82, 'Le sel de nos nuits', 'Bertrand Leclipteux', 'https://www.leseldenosnuits.com/', '2023-06-16', 3),
(83, 'L’attente sacrée : 9 mois pour donner la vie', 'Martine Texier', NULL, '2009-09-01', 1),
(84, 'Bien-être et maternité', 'Bernadette de Gasquet', NULL, '2022-02-23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mw_section`
--

DROP TABLE IF EXISTS `mw_section`;
CREATE TABLE IF NOT EXISTS `mw_section` (
  `mw_id_sect` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_sect` varchar(100) NOT NULL,
  `mw_content_sect` text NOT NULL,
  `mw_visible_sect` tinyint(1) NOT NULL DEFAULT 1,
  `mw_picture_mw_id_picture` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`mw_id_sect`),
  UNIQUE KEY `mw_title_sect_UNIQUE` (`mw_title_sect`),
  KEY `fk_mw_section_mw_picture1_idx` (`mw_picture_mw_id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_section`
--

INSERT INTO `mw_section` (`mw_id_sect`, `mw_title_sect`, `mw_content_sect`, `mw_visible_sect`, `mw_picture_mw_id_picture`) VALUES
(1, 'Avant la grossesse', 'Grossesse', 1, NULL),
(2, 'Grossesse', '', 1, NULL),
(3, 'Après la naissance', '', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mw_sub_category_ressource`
--

DROP TABLE IF EXISTS `mw_sub_category_ressource`;
CREATE TABLE IF NOT EXISTS `mw_sub_category_ressource` (
  `mw_id_sub_category_ressource` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_sub_category_ressource` varchar(45) NOT NULL,
  PRIMARY KEY (`mw_id_sub_category_ressource`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_sub_category_ressource`
--

INSERT INTO `mw_sub_category_ressource` (`mw_id_sub_category_ressource`, `mw_title_sub_category_ressource`) VALUES
(1, 'Livres'),
(2, 'Sites'),
(3, 'Documentaires'),
(4, 'Podcasts ');

-- --------------------------------------------------------

--
-- Structure de la table `mw_sub_category_ressource_has_mw_category_ressource`
--

DROP TABLE IF EXISTS `mw_sub_category_ressource_has_mw_category_ressource`;
CREATE TABLE IF NOT EXISTS `mw_sub_category_ressource_has_mw_category_ressource` (
  `mw_sub_category_ressource_mw_id_sub_category_ressource` int(10) UNSIGNED NOT NULL,
  `mw_category_ressource_mw_category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_sub_category_ressource_mw_id_sub_category_ressource`,`mw_category_ressource_mw_category_id`),
  KEY `fk_mw_sub_category_ressource_has_mw_category_ressource_mw_c_idx` (`mw_category_ressource_mw_category_id`),
  KEY `fk_mw_sub_category_ressource_has_mw_category_ressource_mw_s_idx` (`mw_sub_category_ressource_mw_id_sub_category_ressource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mw_sub_category_ressource_has_mw_category_ressource`
--

INSERT INTO `mw_sub_category_ressource_has_mw_category_ressource` (`mw_sub_category_ressource_mw_id_sub_category_ressource`, `mw_category_ressource_mw_category_id`) VALUES
(1, 1),
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(2, 1),
(2, 2),
(2, 4),
(2, 6),
(2, 7),
(2, 9),
(2, 11),
(3, 3),
(3, 6),
(3, 9),
(3, 11),
(4, 3),
(4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `mw_user`
--

DROP TABLE IF EXISTS `mw_user`;
CREATE TABLE IF NOT EXISTS `mw_user` (
  `mw_id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_login_user` text NOT NULL,
  `mw_mail_user` text NOT NULL,
  `mw_pwd_user` text NOT NULL,
  PRIMARY KEY (`mw_id_user`),
  UNIQUE KEY `mw_login_user_UNIQUE` (`mw_login_user`) USING HASH,
  UNIQUE KEY `mw_mail_user_UNIQUE` (`mw_mail_user`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mw_agenda`
--
ALTER TABLE `mw_agenda`
  ADD CONSTRAINT `fk_agenda_mw_picture1` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_article`
--
ALTER TABLE `mw_article`
  ADD CONSTRAINT `fk_mw_article_mw_section1` FOREIGN KEY (`mw_section_mw_id_section`) REFERENCES `mw_section` (`mw_id_sect`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_homepage`
--
ALTER TABLE `mw_homepage`
  ADD CONSTRAINT `fk_mw_homepage_mw_picture` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_info`
--
ALTER TABLE `mw_info`
  ADD CONSTRAINT `fk_mw_info_mw_picture1` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_picture`
--
ALTER TABLE `mw_picture`
  ADD CONSTRAINT `fk_mw_picture_mw_article1` FOREIGN KEY (`mw_article_mw_id_article`) REFERENCES `mw_article` (`mw_id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_ressources`
--
ALTER TABLE `mw_ressources`
  ADD CONSTRAINT `fk_mw_ressources_mw_sub_category_ressource1` FOREIGN KEY (`mw_sub_category_ressource_mw_id_sub_category_ressource`) REFERENCES `mw_sub_category_ressource` (`mw_id_sub_category_ressource`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_section`
--
ALTER TABLE `mw_section`
  ADD CONSTRAINT `fk_mw_section_mw_picture1` FOREIGN KEY (`mw_picture_mw_id_picture`) REFERENCES `mw_picture` (`mw_id_picture`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mw_sub_category_ressource_has_mw_category_ressource`
--
ALTER TABLE `mw_sub_category_ressource_has_mw_category_ressource`
  ADD CONSTRAINT `fk_mw_sub_category_ressource_has_mw_category_ressource_mw_cat1` FOREIGN KEY (`mw_category_ressource_mw_category_id`) REFERENCES `mw_category_ressource` (`mw_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mw_sub_category_ressource_has_mw_category_ressource_mw_sub1` FOREIGN KEY (`mw_sub_category_ressource_mw_id_sub_category_ressource`) REFERENCES `mw_sub_category_ressource` (`mw_id_sub_category_ressource`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
