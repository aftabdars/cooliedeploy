<?php

namespace App\Http\Controllers;

use App\Models\frontendconfig;
use Illuminate\Http\Request;

class FrontEndConfigController extends Controller
{
    //
    public function index()
    {
        $singles = frontendconfig::all();
        return response()->json($singles, 200);
    }

    public function updateSpotifyLink(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'spotifylink' => 'required|string',
        ]);

        // Get the spotify link from the request
        $spotifyLink = $request->spotifylink;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'SpotifyLink')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $spotifyLink]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'SpotifyLink',
                'description' => 'Link to the Spotify Page',
                'value' => $spotifyLink
            ]);
        }

        return response()->json(['message' => 'Spotify link updated successfully!'], 200);
    }

    public function updateBiographyText(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'biographytext' => 'required|string',
        ]);

        // Get the spotify link from the request
        $biographyText = $request->biographytext;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'BiographyText')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $biographyText]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'BiographyText',
                'description' => 'Text Displayed in Bio',
                'value' => $biographyText
            ]);
        }

        return response()->json(['message' => 'Bio Text updated successfully!'], 200);
    }

    public function updateFacebookLink(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'facebooklink' => 'required|string',
        ]);

        // Get the spotify link from the request
        $facebookLink = $request->facebooklink;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'FacebookLink')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $facebookLink]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'FacebookLink',
                'description' => 'Link to the Facebook page',
                'value' => $facebookLink
            ]);
        }

        return response()->json(['message' => 'Facebook Link updated successfully!'], 200);
    }

    public function updateInstagramLink(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'instagramlink' => 'required|string',
        ]);

        // Get the spotify link from the request
        $instagramLink = $request->instagramlink;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'InstagramLink')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $instagramLink]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'InstagramLink',
                'description' => 'Link to the Instagram page',
                'value' => $instagramLink
            ]);
        }

        return response()->json(['message' => 'Instagram Link updated successfully!'], 200);
    }

    public function updateYoutubeLink(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'youtubelink' => 'required|string',
        ]);

        // Get the spotify link from the request
        $youtubeLink = $request->youtubelink;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'YoutubeLink')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $youtubeLink]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'YoutubeLink',
                'description' => 'Link to the Youtube page',
                'value' => $youtubeLink
            ]);
        }

        return response()->json(['message' => 'Youtube Link updated successfully!'], 200);
    }

    public function updateSoundCloudLink(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'soundcloudlink' => 'required|string',
        ]);

        // Get the spotify link from the request
        $soundCloudLink = $request->soundcloudlink;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'SoundCloudLink')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $soundCloudLink]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'SoundCloudLink',
                'description' => 'Link to the Soundcloud page',
                'value' => $soundCloudLink
            ]);
        }

        return response()->json(['message' => 'SoundCloud Link updated successfully!'], 200);
    }

    public function updateSpotifySongLink(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'spotifysonglink' => 'required|string',
        ]);

        // Get the spotify link from the request
        $spotifySongLink = $request->spotifysonglink;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'SpotifySongLink')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $spotifySongLink]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'SpotifySongLink',
                'description' => 'Link to the Spotify Song',
                'value' => $spotifySongLink
            ]);
        }

        return response()->json(['message' => 'Spotify Song link updated successfully!'], 200);
    }

    public function updatePhoneContact(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'phonecontact' => 'required|string',
        ]);

        // Get the spotify link from the request
        $phoneContact = $request->phonecontact;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'PhoneContact')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $phoneContact]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'PhoneContact',
                'description' => 'Phone Number',
                'value' => $phoneContact
            ]);
        }

        return response()->json(['message' => 'Phone Number updated successfully!'], 200);
    }

    public function updateBookingsContact(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'bookingscontact' => 'required|string',
        ]);

        // Get the spotify link from the request
        $bookingsContact = $request->bookingscontact;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'BookingsContact')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $bookingsContact]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'BookingsContact',
                'description' => 'Phone Number',
                'value' => $bookingsContact
            ]);
        }

        return response()->json(['message' => 'Bookings Phone Number updated successfully!'], 200);
    }

    public function updateManagementContact(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'managementcontact' => 'required|string',
        ]);

        // Get the spotify link from the request
        $managementContact = $request->managementcontact;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'ManagementContact')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $managementContact]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'ManagementContact',
                'description' => 'Phone Number',
                'value' => $managementContact
            ]);
        }

        return response()->json(['message' => 'Management Phone Number updated successfully!'], 200);
    }

    public function updatePrContact(Request $request)
    {
        // Validate that 'spotifylink' is present in the request
        $request->validate([
            'prcontact' => 'required|string',
        ]);

        // Get the spotify link from the request
        $prContact = $request->prcontact;

        // Find the 'SpotifyLink' in the 'FrontendConfig' table
        $config = frontendconfig::where('name', 'PrContact')->first();

        // If the row exists, update it. If not, create a new one
        if ($config) {
            // Update the existing row
            $config->update(['value' => $prContact]);
        } else {
            // Create a new row if it doesn't exist
            frontendconfig::create([
                'name' => 'PrContact',
                'description' => 'Phone Number',
                'value' => $prContact
            ]);
        }

        return response()->json(['message' => 'Pr Phone Number updated successfully!'], 200);
    }
}
