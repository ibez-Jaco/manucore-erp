<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Template;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class TemplatesSeeder extends Seeder
{
    public function run(): void
    {
        $company = method_exists(Company::class, 'getMain')
            ? Company::getMain()
            : Company::query()->first();

        if (!$company) {
            $this->command?->warn('No company found. Skipping TemplatesSeeder.');
            return;
        }

        $defaults = $this->defaults();

        foreach ($defaults as $slug => $tpl) {
            Template::updateOrCreate(
                ['company_id' => $company->id, 'slug' => $slug],
                [
                    'name'       => $tpl['name'],
                    'subject'    => $tpl['subject'],
                    'body'       => $tpl['body'],
                    'format'     => $tpl['format'],
                    'is_system'  => true,
                    'is_active'  => true,
                    'updated_by' => null,
                ]
            );
        }
    }

    private function defaults(): array
    {
        // Branded-neutral, ZAR context, VAT 15%, placeholders are literal {{ ... }}
        return [
            'invoice_email' => [
                'name'    => 'Invoice Email',
                'subject' => 'Invoice {{ document.number }} from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => <<<MD
Hi {{ customer.name }},

Please find attached **Invoice {{ document.number }}** dated {{ document.date }}.

**Totals**  
- Subtotal: R {{ document.total_excl }}  
- VAT ({{ document.vat_percent }}%): R {{ document.total_incl - document.total_excl }}  
- Total Due: **R {{ document.total_incl }}**

If you have any questions, reply to this email or contact us at {{ company.email }} / {{ company.phone }}.

Kind regards,  
**{{ company.name }}**  
{{ branch.name }}

> Banking: Please reference **{{ document.number }}** on payment. Standard VAT rate is **15%** in South Africa.
MD,
            ],
            'quote_email' => [
                'name'    => 'Quote Email',
                'subject' => 'Quote {{ document.number }} from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => <<<MD
Hi {{ customer.name }},

Here is your **Quote {{ document.number }}** dated {{ document.date }}.

**Totals**  
- Subtotal: R {{ document.total_excl }}  
- VAT ({{ document.vat_percent }}%): R {{ document.total_incl - document.total_excl }}  
- Total: **R {{ document.total_incl }}**

Let us know if you’d like to proceed. We’re happy to assist with any adjustments.

Best,  
**{{ company.name }}**  
{{ branch.name }}
MD,
            ],
            'statement_email' => [
                'name'    => 'Statement Email',
                'subject' => 'Monthly Statement from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => <<<MD
Dear {{ customer.name }},

Please find attached your **monthly statement** for {{ document.date }}.

If any items need clarification, contact Accounts at {{ company.email }}.  
Totals shown are VAT inclusive at **15%** where applicable.

Sincerely,  
**{{ company.name }}**  
{{ branch.name }}
MD,
            ],
            'generic_email' => [
                'name'    => 'Generic Email',
                'subject' => 'Message from {{ company.name }}',
                'format'  => 'markdown',
                'body'    => <<<MD
Hi {{ customer.name }},

This is a message regarding **{{ document.number }}** dated {{ document.date }}.

We appreciate your business.  
For assistance, reach us at {{ company.email }} / {{ company.phone }}.

Regards,  
**{{ company.name }}**  
{{ branch.name }}
MD,
            ],
        ];
    }
}
