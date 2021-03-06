@extends('layouts.main')

@section('seo.title', 'Админпанель - Список пользователей')

@section('content')

    <div class="container py-3">

        @include('admin.includes.people-menu')

        @if (!empty($peoples))

            <div class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="display: inline; height: 20px;">
                    <path style="fill:#ECEFF1;"
                        d="M496,432.011H272c-8.832,0-16-7.168-16-16s0-311.168,0-320s7.168-16,16-16h224 c8.832,0,16,7.168,16,16v320C512,424.843,504.832,432.011,496,432.011z" />
                    <g>
                        <path style="fill:#388E3C;"
                            d="M336,176.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,176.011,336,176.011z" />
                        <path style="fill:#388E3C;"
                            d="M336,240.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,240.011,336,240.011z" />
                        <path style="fill:#388E3C;"
                            d="M336,304.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,304.011,336,304.011z" />
                        <path style="fill:#388E3C;"
                            d="M336,368.011h-64c-8.832,0-16-7.168-16-16s7.168-16,16-16h64c8.832,0,16,7.168,16,16 S344.832,368.011,336,368.011z" />
                        <path style="fill:#388E3C;"
                            d="M432,176.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,176.011,432,176.011z" />
                        <path style="fill:#388E3C;"
                            d="M432,240.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,240.011,432,240.011z" />
                        <path style="fill:#388E3C;"
                            d="M432,304.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,304.011,432,304.011z" />
                        <path style="fill:#388E3C;"
                            d="M432,368.011h-32c-8.832,0-16-7.168-16-16s7.168-16,16-16h32c8.832,0,16,7.168,16,16 S440.832,368.011,432,368.011z" />
                    </g>
                    <path style="fill:#2E7D32;"
                        d="M282.208,19.691c-3.648-3.04-8.544-4.352-13.152-3.392l-256,48C5.472,65.707,0,72.299,0,80.011v352 c0,7.68,5.472,14.304,13.056,15.712l256,48c0.96,0.192,1.952,0.288,2.944,0.288c3.712,0,7.328-1.28,10.208-3.68 c3.68-3.04,5.792-7.584,5.792-12.32v-448C288,27.243,285.888,22.731,282.208,19.691z" />
                    <path style="fill:#FAFAFA;"
                        d="M220.032,309.483l-50.592-57.824l51.168-65.792c5.44-6.976,4.16-17.024-2.784-22.464 c-6.944-5.44-16.992-4.16-22.464,2.784l-47.392,60.928l-39.936-45.632c-5.856-6.72-15.968-7.328-22.56-1.504 c-6.656,5.824-7.328,15.936-1.504,22.56l44,50.304L83.36,310.187c-5.44,6.976-4.16,17.024,2.784,22.464 c2.944,2.272,6.432,3.36,9.856,3.36c4.768,0,9.472-2.112,12.64-6.176l40.8-52.48l46.528,53.152 c3.168,3.648,7.584,5.504,12.032,5.504c3.744,0,7.488-1.312,10.528-3.968C225.184,326.219,225.856,316.107,220.032,309.483z" />
                </svg>
                <a href="{{ route('admin.people.export') }}" class="text-decoration-none ps-1" title="">Сохранить данные в
                    Excel</a>
            </div>

            <style>
                td {
                    border: 1px solid #ccc;
                    padding: 5px 10px;
                    font-size: .8rem;
                }

            </style>

            <table>
                <tr>
                    <td>id</td>
                    <td>ФИО</td>
                    <td>Долг</td>
                    <td>Госпошлина</td>
                    <td>Дата создания</td>
                    <td>Дата обновления</td>
                </tr>
                @foreach ($peoples as $people)
                    <tr>
                        <td>{{ $people->id }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.people.loadPdf', $people->id) }}"
                                class="d-inline me-2">
                                @csrf
                                <button class="btn p-0 shadow-none" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 16px;">
                                        <path style="fill:#E2E5E7;"
                                            d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z" />
                                        <path style="fill:#B0B7BD;" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z" />
                                        <polygon style="fill:#CAD1D8;" points="480,224 384,128 480,128 " />
                                        <path style="fill:#F15642;"
                                            d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16 V416z" />
                                        <g>
                                            <path style="fill:#FFFFFF;"
                                                d="M101.744,303.152c0-4.224,3.328-8.832,8.688-8.832h29.552c16.64,0,31.616,11.136,31.616,32.48 c0,20.224-14.976,31.488-31.616,31.488h-21.36v16.896c0,5.632-3.584,8.816-8.192,8.816c-4.224,0-8.688-3.184-8.688-8.816V303.152z M118.624,310.432v31.872h21.36c8.576,0,15.36-7.568,15.36-15.504c0-8.944-6.784-16.368-15.36-16.368H118.624z" />
                                            <path style="fill:#FFFFFF;"
                                                d="M196.656,384c-4.224,0-8.832-2.304-8.832-7.92v-72.672c0-4.592,4.608-7.936,8.832-7.936h29.296 c58.464,0,57.184,88.528,1.152,88.528H196.656z M204.72,311.088V368.4h21.232c34.544,0,36.08-57.312,0-57.312H204.72z" />
                                            <path style="fill:#FFFFFF;"
                                                d="M303.872,312.112v20.336h32.624c4.608,0,9.216,4.608,9.216,9.072c0,4.224-4.608,7.68-9.216,7.68 h-32.624v26.864c0,4.48-3.184,7.92-7.664,7.92c-5.632,0-9.072-3.44-9.072-7.92v-72.672c0-4.592,3.456-7.936,9.072-7.936h44.912 c5.632,0,8.96,3.344,8.96,7.936c0,4.096-3.328,8.704-8.96,8.704h-37.248V312.112z" />
                                        </g>
                                        <path style="fill:#CAD1D8;"
                                            d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z" />
                                    </svg>
                                </button>
                            </form>
                            <a href="{{ route('admin.people.show', $people->id) }}"
                                target="_blank">{{ $people->Lastname }} {{ $people->FirstName }}
                                {{ $people->Secondname }}</a>
                        </td>
                        <td style="text-align: right;">{{ number_format( $people->Debt, 2, '.', ' ' ) }}</td>
                        <td style="text-align: right;">{{ number_format( $people->StateFee, 2, '.', ' ' ) }}</td>
                        <td>{{ $people->created_at }}</td>
                        <td>{{ $people->updated_at }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            Записей не обнаружено.
        @endif

    </div>

@endsection
