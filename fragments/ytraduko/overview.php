<?php /** @var rex_fragment $this */ ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="rex-table-icon">&nbsp;</th>
            <th style="width: 200px"><?= rex_i18n::msg('package_hname') ?></th>
            <th style="width: 100px"><?= rex_i18n::msg('package_hversion') ?></th>
            <th style="width: 100px" class="text-center">de_de</th>
            <?php foreach ($this->languages as $language): ?>
                <th class="text-center"><?= $this->escape($language) ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->packages as $package): /** @var rex_ytraduko_package $package */ ?>
            <tr>
                <td class="rex-table-icon"><i class="rex-icon rex-icon-package-addon"></i></td>
                <td><?= $this->escape($package->getName()) ?></td>
                <td><?= $this->escape($package->getVersion()) ?></td>
                <td class="text-center"><?= $package->countKeys() ?></td>
                <?php foreach ($this->languages as $language): ?>
                    <?php $percentage = (int) (100 * $package->countLanguageKeys($language) / $package->countKeys()); ?>
                    <td class="text-center">
                        <a href="<?= $this->context->getUrl(['language' => $language, 'package' => $package->getName()]) ?>">
                            <div class="progress" style="margin-bottom: 0">
                                <div class="progress-bar progress-bar-success" style="width: <?= $percentage ?>%">
                                    <?= $percentage ?> %
                                </div>
                                <div class="progress-bar progress-bar-danger" style="width: <?= 100 - $percentage ?>%"></div>
                            </div>
                        </a>
                    </td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr style="background-color: #dfe3e9">
            <td class="rex-table-icon"></td>
            <td><b><?= mb_strtoupper($this->i18n('ytraduko_total')) ?></b></td>
            <td></td>
            <td class="text-center"><b><?= $this->total['de_de'] ?></b></td>
            <?php foreach ($this->languages as $language): ?>
                <?php $percentage = (int) (100 * $this->total[$language] / $this->total['de_de']); ?>
                <td class="text-center">
                    <div class="progress" style="margin-bottom: 0">
                        <div class="progress-bar progress-bar-success" style="width: <?= $percentage ?>%">
                            <?= $percentage ?> %
                        </div>
                        <div class="progress-bar progress-bar-danger" style="width: <?= 100 - $percentage ?>%"></div>
                    </div>
                </td>
            <?php endforeach ?>
        </tr>
    </tfoot>
</table>
