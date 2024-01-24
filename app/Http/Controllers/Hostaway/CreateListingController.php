<?php

namespace App\Http\Controllers\Hostaway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateListingController extends Controller
{
    public function addbedtypefromHostaway()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.hostaway.com/v1/listings",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n    \"propertyTypeId\": 1,\n    \"name\": \"Beautiful and cozy apartment close to city center\",\n    \"externalListingName\": \"Beautiful and cozy apartment close to city center\",\n    \"internalListingName\": \"Property #3\",\n    \"description\": \"In a classic Bremerhaven house we rent out our apartment which has a living room, bed room and is close to all the restaurants and nightlife.\",\n    \"houseRules\": \"Additional rules\",\n    \"keyPickup\": \"Key pickup\",\n    \"specialInstruction\": \"Any special instruction\",\n    \"doorSecurityCode\": \"ddff8\",\n    \"country\": \"Germany\",\n    \"countryCode\": \"DE\",\n    \"state\": \"Bremen\",\n    \"city\": \"Bremerhaven\",\n    \"street\": \"Schulstraße 7\",\n    \"address\": \"Schulstraße 7, Bremerhaven, Bremen 27570, Germany\",\n    \"publicAddress\": \"Bremerhaven, Bremen 27570, Germany\",\n    \"zipcode\": \"27570\",\n    \"price\": 211.62,\n    \"starRating\": 5,\n    \"weeklyDiscount\": 0.71,\n    \"monthlyDiscount\": 0.82,\n    \"propertyRentTax\": 12,\n    \"guestPerPersonPerNightTax\": 10,\n    \"guestStayTax\": 12,\n    \"guestNightlyTax\": 13,\n    \"refundableDamageDeposit\": 15,\n    \"personCapacity\": 6,\n    \"maxChildrenAllowed\": null,\n    \"maxInfantsAllowed\": null,\n    \"maxPetsAllowed\": null,\n    \"lat\": 53.5403,\n    \"lng\": 8.58936,\n    \"checkInTimeStart\": 12,\n    \"checkInTimeEnd\": 21,\n    \"checkOutTime\": 11,\n    \"cancellationPolicy\": \"strict\",\n    \"cancellationPolicyId\": 1,\n \"bookingcomPropertyHasVat\": true,\n  \"vrboCancellationPolicyId\": 2,\n    \"bookingCancellationPolicyId\": 3,\n    \"airbnbCancellationPolicyId\": 4,\n    \"marriottCancellationPolicyId\": 5,\n    \"squareMeters\": 10,\n    \"roomType\": \"entire_home\",\n    \"bathroomType\": \"shared\",\n    \"bedroomsNumber\": 1,\n    \"bedsNumber\": 1,\n    \"bedType\": \"real_bed\",\n    \"bathroomsNumber\": 1,\n    \"minNights\": 1,\n    \"maxNights\": 1125,\n    \"guestsIncluded\": 3,\n    \"cleaningFee\": 40.32,\n    \"priceForExtraPerson\": 54.01,\n    \"instantBookable\": 0,\n    \"instantBookableLeadTime\": 1,\n    \"allowSameDayBooking\": 2,\n    \"sameDayBookingLeadTime\": 12,\n    \"contactName\": \"contactName\",\n    \"contactSurName\": \"contactSurName\",\n    \"contactPhone1\": \"contactPhone1\",\n    \"contactPhone2\": \"contactPhone2\",\n    \"contactLanguage\": \"contactLanguage\",\n    \"contactEmail\": \"contactEmail@mail.com\",\n    \"contactAddress\": \"contactAddress\",\n    \"language\": \"en\",\n    \"currencyCode\": \"USD\",\n    \"timeZoneName\": \"Europe/Berlin\",\n    \"wifiUsername\": \"un\",\n    \"wifiPassword\": \"pass\",\n    \"cleannessStatus\": null,\n    \"cleaningInstruction\": null,\n    \"cleannessStatusUpdatedOn\": null,\n    \"homeawayPropertyName\": \"Beautiful and cozy apartment close to city center\",\n    \"homeawayPropertyHeadline\": \"Beautiful and cozy apartment close to city center with a living room and bed room\",\n    \"homeawayPropertyDescription\": \"In a classic Bremerhaven house we rent out our apartment which has a living room, bed room and is close to all the restaurants and nightlife.\",\n  \"bookingcomPropertyName\": \"Beautiful and cozy apartment close to city center\",\n    \"bookingcomPropertyDescription\": \"In a classic Bremerhaven house we rent out our apartment which has a living room, bed room and is close to all the restaurants and nightlife.\",\n    \"invoicingContactName\": \"Name\",\n    \"invoicingContactSurName\": \"SurName\",\n    \"invoicingContactPhone1\": \"+11122334456\",\n    \"invoicingContactPhone2\": \"+11122334456\",\n    \"invoicingContactLanguage\": \"en\",\n    \"invoicingContactEmail\": \"invoice@company.com\",\n    \"invoicingContactAddress\": \"221B Baker Street\",\n    \"invoicingContactCity\": \"London\",\n    \"invoicingContactZipcode\": \"110011\",\n    \"invoicingContactCountry\": \"UK\",\n    \"listingAmenities\": [\n        {\n            \"amenityId\": 2\n        },\n        {\n            \"amenityId\": 3\n        },\n        {\n            \"amenityId\": 3\n        }\n    ],\n    \"listingBedTypes\": [\n        {\n            \"bedTypeId\": 2,\n            \"quantity\": 1\n        },\n        {\n            \"bedTypeId\": 33,\n            \"quantity\": 1\n        },\n        {\n            \"bedTypeId\": 33,\n            \"quantity\": 1\n        }\n    ],\n    \"listingImages\": [\n        {\n            \"caption\": \"Kitche\",\n            \"url\": \"https://www.sharingxchange.com/spacelist/assets/uploads/property/9/5853ff465e538.JPG\",\n            \"sortOrder\": 2\n        },\n        {\n            \"caption\": \"hall\",\n            \"url\": \"https://www.sharingxchange.com/spacelist/assets/uploads/property/6/57eb022da2b28.jpg\",\n            \"sortOrder\": 3\n        }\n    ]\n,\"customFieldValues\": [{\"customFieldId\": 167, \"value\": \"Custom field value one\"}, {\"customFieldId\": 243, \"value\": \"Custom field value two\"}]\n}",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4Nzg0OSIsImp0aSI6ImNkYzBlZTc4MjhhOTJjYjRlNjU3ZGQwYzM5ZTFiZDFlZjM2Mzg1NGQwODUyYzdjZDVjYmJjMmJkYzIyZWJjYmEzNTkwYTFmNjY1NDcwZDIyIiwiaWF0IjoxNzA1NTc2NTAzLjYzNTI3NSwibmJmIjoxNzA1NTc2NTAzLjYzNTI3NiwiZXhwIjoyMDIxMTk1NzAzLjYzNTI4Miwic3ViIjoiIiwic2NvcGVzIjpbImdlbmVyYWwiXSwic2VjcmV0SWQiOjI1OTYwfQ.hdrNg9TRSiSJG0TZBDQOZ3xZbVIca0keVy1FwmJFQsKKmLKjrCy-akU5nKvOrRYQlOX1NVIaLP_Y-4gzld6rd0qrGPOa-MLseZjWv4u-6xQRgWePZcrVOSGwrE_TPvmR_-mGBUnUUjAwfkfbA8cz1WRF3CDR-DM4zQVmi6tqSr8",
            "Cache-control: no-cache",
            "Content-type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
}
