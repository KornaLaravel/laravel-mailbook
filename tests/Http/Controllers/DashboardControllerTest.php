<?php

use function Pest\Laravel\get;
use Xammie\Mailbook\Facades\Mailbook;
use Xammie\Mailbook\Tests\Mails\TestMail;

it('can render', function () {
    Mailbook::add(TestMail::class);

    get(route('mailbook.dashboard'))
        ->assertSuccessful()
        ->assertSeeText('Mailbook')
        ->assertSeeText('Test email subject');
});

it('can render closure', function () {
    Mailbook::add(fn () => new TestMail());

    get(route('mailbook.dashboard'))
        ->assertSuccessful()
        ->assertSeeText('Mailbook')
        ->assertSeeText('Test email subject');
});

it('can render selected', function () {
    Mailbook::add(fn () => new TestMail());
    Mailbook::add(fn () => new TestMail());

    get(route('mailbook.dashboard', ['selected' => TestMail::class]))
        ->assertSuccessful()
        ->assertSeeText('Mailbook')
        ->assertSeeText('Test email subject');
});

it('cannot render without mailables', function () {
    get(route('mailbook.dashboard'))
        ->assertStatus(500);
});
