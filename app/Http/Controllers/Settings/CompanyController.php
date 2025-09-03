<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateCompanyRequest;
use App\Http\Requests\Settings\UpdateCompanyBasicRequest;
use App\Http\Requests\Settings\UpdateCompanyContactRequest;
use App\Http\Requests\Settings\UpdateCompanyAddressRequest;
use App\Http\Requests\Settings\UpdateCompanyFinancialRequest;
use App\Http\Requests\Settings\UpdateCompanySystemRequest;
use App\Http\Requests\Settings\UpdateCompanyFinanceRequest;
use App\Http\Requests\Settings\UpdateCompanyEmailRequest;
use App\Http\Requests\Settings\UpdateCompanyInfrastructureRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function company()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404, 'No company found. Seed or create a company first.');
        return view('settings.company.index', compact('company'));
    }

    // Legacy overview save (kept for backward compatibility)
    public function update(UpdateCompanyRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404, 'No company found.');

        $data = $request->validated();

        if (empty($data['use_postal_address'])) {
            $data['postal_address_line_1'] = null;
            $data['postal_address_line_2'] = null;
            $data['postal_city'] = null;
            $data['postal_state_province'] = null;
            $data['postal_postal_code'] = null;
            $data['postal_country'] = null;
        }

        $company->update($data);

        return redirect()->route('settings.company')->with('success', 'Company details updated successfully.');
    }

    // ---------- Split Tabs ----------

    // A) Basic
    public function basic()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.basic', compact('company'));
    }
    public function basicUpdate(UpdateCompanyBasicRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        $company->update($request->validated());
        return redirect()->route('settings.company.basic')->with('success', 'Basic details updated.');
    }

    // B) Contact
    public function contact()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.contact', compact('company'));
    }
    public function contactUpdate(UpdateCompanyContactRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        $company->update($request->validated());
        return redirect()->route('settings.company.contact')->with('success', 'Contact details updated.');
    }

    // C) Address
    public function address()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.address', compact('company'));
    }
    public function addressUpdate(UpdateCompanyAddressRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);

        $data = $request->validated();
        if (empty($data['use_postal_address'])) {
            $data['postal_address_line_1'] = null;
            $data['postal_address_line_2'] = null;
            $data['postal_city'] = null;
            $data['postal_state_province'] = null;
            $data['postal_postal_code'] = null;
            $data['postal_country'] = null;
        }
        $company->update($data);

        return redirect()->route('settings.company.address')->with('success', 'Address details updated.');
    }

    // D) Financial
    public function financial()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.financial', compact('company'));
    }
    public function financialUpdate(UpdateCompanyFinancialRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        $company->update($request->validated());
        return redirect()->route('settings.company.financial')->with('success', 'Financial settings updated.');
    }

    // E) System
    public function system()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.system', compact('company'));
    }
    public function systemUpdate(UpdateCompanySystemRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        $company->update($request->validated());
        return redirect()->route('settings.company.system')->with('success', 'System settings updated.');
    }

    // F) Banking & VAT (Phase 4.5)
    public function finance()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.finance', compact('company'));
    }
    public function financeUpdate(UpdateCompanyFinanceRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        $company->update($request->validated());
        return redirect()->route('settings.company.finance')->with('success', 'Banking & VAT saved.');
    }

    // G) Email & Templates
    public function email()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.email', compact('company'));
    }
    public function emailUpdate(UpdateCompanyEmailRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        $company->update($request->validated());
        return redirect()->route('settings.company.email')->with('success', 'Email & templates saved.');
    }

    // H) Infrastructure (Mail Server + Database)
    public function infrastructure()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);
        return view('settings.company.infrastructure', compact('company'));
    }
    public function infrastructureUpdate(UpdateCompanyInfrastructureRequest $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404);

        $data = $request->validated();

        // If passwords are omitted, keep existing values (don't null them out)
        if (!filled($data['mail_password'] ?? null)) {
            unset($data['mail_password']);
        }
        if (!filled($data['db_password'] ?? null)) {
            unset($data['db_password']);
        }

        $company->update($data);

        return redirect()->route('settings.company.infrastructure')->with('success', 'Infrastructure settings saved.');
    }
    
}
