<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlotRequest;
use App\Http\Requests\UpdateSlotRequest;
use App\Models\Package;
use App\Models\PackageSlot;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SlotController extends Controller
{
    public function index(Package $package): View
    {
        $slots = $package->slots()->orderBy('date')->get();
        return view('admin.slots.index', compact('package', 'slots'));
    }

    public function create(Package $package): View
    {
        return view('admin.slots.create', compact('package'));
    }

    public function store(StoreSlotRequest $request, Package $package): RedirectResponse
    {
        $data = $request->validated();
        $data['package_id'] = $package->id;

        PackageSlot::create($data);

        return redirect()->route('admin.packages.slots.index', $package)->with('success', 'Slot berhasil dibuat.');
    }

    public function edit(Package $package, PackageSlot $slot): View
    {
        abort_if($slot->package_id !== $package->id, 404);
        return view('admin.slots.edit', compact('package', 'slot'));
    }

    public function update(UpdateSlotRequest $request, Package $package, PackageSlot $slot): RedirectResponse
    {
        abort_if($slot->package_id !== $package->id, 404);
        $data = $request->validated();

        if (isset($data['booked_count']) && $data['booked_count'] > $data['quota']) {
            return back()->withErrors(['quota' => 'Booked count tidak boleh melebihi kuota.']);
        }

        $slot->update($data);

        return redirect()->route('admin.packages.slots.index', $package)->with('success', 'Slot diperbarui.');
    }

    public function destroy(Package $package, PackageSlot $slot): RedirectResponse
    {
        abort_if($slot->package_id !== $package->id, 404);
        $slot->delete();

        return redirect()->route('admin.packages.slots.index', $package)->with('success', 'Slot dihapus.');
    }
}
