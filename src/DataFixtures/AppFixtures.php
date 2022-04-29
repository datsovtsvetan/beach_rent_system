<?php

namespace App\DataFixtures;

use App\Entity\Beach;
use App\Entity\Booking;
use App\Entity\Company;
use App\Entity\DeckChair;
use App\Entity\Pair;
use App\Entity\SingleDeckChair;
use App\Entity\Umbrella;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $company1 = new Company();
        $company1->setName('Company1TestName');
        $company1->setIsActive(true);
        $manager->persist($company1);

        $company2 = new Company();
        $company2->setName('Company2TestName');
        $company2->setIsActive(true);
        $manager->persist($company2);

        $beach1 = new Beach();
        $beach1->setName('Beach1Company1TestName');
        $beach1->setIsActive(true);
        $beach1->setCompany($company1);
        $manager->persist($beach1);

        $beach2 = new Beach();
        $beach2->setName('Beach2Company1TestName');
        $beach2->setIsActive(true);
        $beach2->setCompany($company1);
        $manager->persist($beach2);

        $beach3 = new Beach();
        $beach3->setName('Beach3Company2TestName');
        $beach3->setIsActive(true);
        $beach3->setCompany($company2);
        $manager->persist($beach3);

        $beach4 = new Beach();
        $beach4->setName('Beach4Company2TestName');
        $beach4->setIsActive(true);
        $beach4->setCompany($company2);
        $manager->persist($beach4);

        $pair1 = new Pair();
        $pair1->setName('Company1Pair1Beach1TestName');
        $pair1->setBeach($beach1);
        $pair1->setCompany($company1);
        $manager->persist($pair1);

        $pair2 = new Pair();
        $pair2->setName('Company2Pair2Beach3TestName');
        $pair2->setBeach($beach3);
        $pair2->setCompany($company1);
        $manager->persist($pair2);

        $pair3 = new Pair();
        $pair3->setName('Company2Pair3Beach3TestName');
        $pair3->setBeach($beach3);
        $pair3->setCompany($company1);
        $manager->persist($pair3);

        $singleDeckChair1 = new SingleDeckChair();
        $singleDeckChair1->setImgUrl('SingleDeckChair1ImgUrl');
        $singleDeckChair1->setIsRented(true);
        $singleDeckChair1->setName('SingleDeckChair2');
        $singleDeckChair1->setRotation(0);
        $singleDeckChair1->setXAxis(140000);
        $singleDeckChair1->setYAxis(26000);
        $singleDeckChair1->setRentCount(1);
        $singleDeckChair1->setBeach($beach1);
        $singleDeckChair1->setCompany($company1);
        $manager->persist($singleDeckChair1);

        $singleDeckChair2 = new SingleDeckChair();
        $singleDeckChair2->setImgUrl('SingleDeckChair2ImgUrl');
        $singleDeckChair2->setIsRented(true);
        $singleDeckChair2->setName('SingleDeckChair2');
        $singleDeckChair2->setRotation(0);
        $singleDeckChair2->setXAxis(100000);
        $singleDeckChair2->setYAxis(20000);
        $singleDeckChair2->setRentCount(1);
        $singleDeckChair2->setBeach($beach1);
        $singleDeckChair2->setCompany($company1);
        $manager->persist($singleDeckChair2);

        $deckChair1 = new DeckChair();
        $deckChair1->setImgUrl('DeckChair1Pair1Company1ImgUrl');
        $deckChair1->setIsRented(true);
        $deckChair1->setName('Company1Beach1Pair1DeckChair1TestName');
        $deckChair1->setRotation(0);
        $deckChair1->setXAxis(140000);
        $deckChair1->setYAxis(26000);
        $deckChair1->setRentCount(1);
        $deckChair1->setPair($pair1);
        $deckChair1->setBeach($beach1);
        $deckChair1->setCompany($company1);
        $manager->persist($deckChair1);

        $deckChair2 = new DeckChair();
        $deckChair2->setImgUrl('DeckChair2Pair1Company1ImgUrl');
        $deckChair2->setIsRented(true);
        $deckChair2->setName('Company1Beach1Pair1DeckChair2TestName');
        $deckChair2->setRotation(0);
        $deckChair2->setXAxis(100000);
        $deckChair2->setYAxis(20000);
        $deckChair2->setRentCount(1);
        $deckChair2->setPair($pair1);
        $deckChair2->setBeach($beach1);
        $deckChair2->setCompany($company1);
        $manager->persist($deckChair2);


        $deckChair3 = new DeckChair();
        $deckChair3->setImgUrl('DeckChair1Pair1Company1ImgUrl');
        $deckChair3->setIsRented(true);
        $deckChair3->setName('Company1Beach1Pair1DeckChair1TestName');
        $deckChair3->setRotation(0);
        $deckChair3->setXAxis(140000);
        $deckChair3->setYAxis(26000);
        $deckChair3->setRentCount(1);
        $deckChair3->setPair($pair2);
        $deckChair3->setBeach($beach2);
        $deckChair3->setCompany($company1);
        $manager->persist($deckChair3);

        $deckChair4 = new DeckChair();
        $deckChair4->setImgUrl('DeckChair2Pair1Company1ImgUrl');
        $deckChair4->setIsRented(true);
        $deckChair4->setName('Company1Beach1Pair1DeckChair2TestName');
        $deckChair4->setRotation(0);
        $deckChair4->setXAxis(100000);
        $deckChair4->setYAxis(20000);
        $deckChair4->setRentCount(1);
        $deckChair4->setPair($pair2);
        $deckChair4->setBeach($beach2);
        $deckChair4->setCompany($company1);
        $manager->persist($deckChair4);

        $umbrella1 = new Umbrella();
        $umbrella1->setName('Company1Beach1Pair1Umbrella1TestName');
        $umbrella1->setImgUrl('Company1Beach1Pair1Umbrella1ImgUrl');
        $umbrella1->setIsRented(true);
        $umbrella1->setRentCount(1);
        $umbrella1->setRotation(0);
        $umbrella1->setXAxis(13000);
        $umbrella1->setYAxis(11000);
        $umbrella1->setBeach($beach1);
        $umbrella1->setCompany($company1);
        $manager->persist($umbrella1);

        $umbrella2 = new Umbrella();
        $umbrella2->setName('Company1Beach1Pair1Umbrella1TestName');
        $umbrella2->setImgUrl('Company1Beach1Pair1Umbrella1ImgUrl');
        $umbrella2->setIsRented(true);
        $umbrella2->setRentCount(1);
        $umbrella2->setRotation(0);
        $umbrella2->setXAxis(13000);
        $umbrella2->setYAxis(11000);
        $umbrella2->setBeach($beach1);
        $umbrella2->setCompany($company1);
        $manager->persist($umbrella2);

        $booking = new Booking();
        $booking->setClient('Test Client with Long Looooooooooooong nameeeeeeeeeeeeeee');
        $booking->setDate(new \DateTimeImmutable('now'));
        $booking->setDeckChair($deckChair1);
        $booking->setBeach($beach1);
        $booking->setCompany($company1);
        $manager->persist($booking);

        $manager->flush();
    }
}
