<style>
    span td {
        border: 1px solid grey;
    }

    /* td {
        margin: 1cm
    } */
</style>

<table cellspacing="0" cellpadding="0" style="vertical-align:middle;">
    <tbody>
        <tr>
            <td colspan="3"></td>
            <td style="text-align: center; font-size:14px;" colspan="6">
                <b> Delivery Note</b>
            </td>
            <td colspan="3">QR - <?= $uuid ?></td>
        </tr>
    </tbody>
</table>
<span class="tg-wrap" style="vertical-align:middle;">
    <table cellspacing="0" cellpadding="2">
        <tbody>
            <tr>
                <td style="border:none;width:1cm"></td>
                <td style="border:none;width:2.5cm"></td>
                <td style="border:none;width:2.5cm"></td>
                <td style="border:none;width:1cm"></td>
                <td style="border:none;width:1cm"></td>
                <td style="border:none;width:1.5cm"></td>
                <td style="border:none;width:1.5cm"></td>
                <td style="border:none;width:2cm"></td>
                <td style="border:none;width:2cm"></td>
                <td style="border:none;width:3cm"></td>
                <td style="border:none;width:2cm"></td>
                <td style="border:none;width:1cm"></td>
            </tr>
            <tr>
                <td colspan="2">DN #</td>
                <td colspan="3"><?= $no_dn ?></td>
                <td colspan="2">Creator</td>
                <td colspan="2"><?= $creator ?></td>
                <td>Outbound date</td>
                <td colspan="2"><?= $outbound_date ?></td>
            </tr>
            <tr>
                <td colspan="2">Source Bill #</td>
                <td colspan="3"><?= $no_gi ?></td>
                <td colspan="2">Applicant</td>
                <td colspan="2"><?= $applicant ?></td>
                <td>Request date</td>
                <td colspan="2"><?= $request_date ?></td>
            </tr>
            <tr>
                <td colspan="2">Project #</td>
                <td colspan="3"><?= $project ?></td>
                <td colspan="2">Carrier</td>
                <td colspan="2"><?= $carrier ?></td>
                <td>Driver</td>
                <td colspan="2"><?= $driver ?></td>
            </tr>
            <tr>
                <td colspan="2">Koordinator Project #</td>
                <td colspan="3"><?= $koordinator ?></td>
                <td colspan="2">Consignee</td>
                <td colspan="2"><?= $consignee ?></td>
                <td>Vehicle ID</td>
                <td colspan="2"><?= $vehicle_id ?></td>
            </tr>
            <tr>
                <td colspan="2">Project Name</td>
                <td colspan="7"><?= $project_name ?></td>
                <td>Consignee telp</td>
                <td colspan="2"><?= '62' . $consignee_telephone ?></td>
            </tr>
            <tr>
                <td colspan="2">Destination Add.</td>
                <td colspan="10"><?= $destination_add ?></td>
            </tr>
            <tr>
                <td colspan="12"></td>
            </tr>
            <tr style="text-align:center;">
                <td>No</td>
                <td>Box # / Pallet #</td>
                <td>Item Code</td>
                <td colspan="2">No DPPB</td>
                <td>Qty</td>
                <td>Unit</td>
                <td colspan="2">Description</td>
                <td>No PO</td>
                <td colspan="2">Site ID</td>
            </tr>
            <?php
            $start = 0;

            foreach ($detail_dppb as $key) : ?>
                <tr style="text-align: center;">
                    <td><?= ++$start ?></td>
                    <td>-</td>
                    <td><?= $key->kode_material ?></td>
                    <td colspan="2"><?= $no_dppb ?></td>
                    <td><?= $key->jumlah_material ?></td>
                    <td><?= $key->satuan ?></td>
                    <td colspan="2"><?= $key->keterangan ?></td>
                    <td><?= $key->no_po ?></td>
                    <td colspan="2"><?= $key->jenis_gudang . '-' . $key->lokasi ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="12"></td>
            </tr>
            <tr>
                <td colspan="2">Remark:</td>
                <td colspan="10"><?= $remark ?></td>
            </tr>

        </tbody>
    </table>
</span>
<table cellpadding="2" cellspacing="10">
    <tbody>
        <tr>
            <td colspan="1">Consignee</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>

            <td colspan="1">Vehicle Driver</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>

            <td colspan="1">Warehouse PIC</td>
            <td colspan="1" style="border-bottom: 1px solid black; width:3cm"></td>
        </tr>
        <tr>
            <td colspan="1">Signature</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>

            <td colspan="1">Signature</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>

            <td colspan="1">Signature</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>
        </tr>
        <tr>
            <td colspan="1">Date</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>

            <td colspan="1">Date</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>

            <td colspan="1">Date</td>
            <td colspan="1" style="border-bottom: 1px solid grey; width:3cm"></td>
        </tr>
    </tbody>
</table>